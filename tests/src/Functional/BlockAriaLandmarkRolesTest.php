<?php

namespace Drupal\block_aria_landmark_roles\Tests\Functional;

use Drupal\Tests\BrowserTestBase;
use Drupal\user\Entity\User;

/**
 * @group block_aria_landmark_roles
 */
class BlockAriaLandmarkRolesTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  public static $modules = [
    'block',
    'block_aria_landmark_roles',
  ];

  /**
   * @var User
   */
  private $admin_user;

  /**
   * @var string
   */
  private $output = 'div id="block-mainpagecontent" role="banner"';

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->admin_user = $this->createUser(['administer blocks']);
  }

  public function testBlockAriaLandmarkRoles() {
    // Ensure that the markup isn’t already there.
    $this->assertSession()->responseNotContains($this->output);

    $this->drupalLogin($this->admin_user);

    $path = 'admin/structure/block/add/system_main_block/classy';
    $edit = [
      'region' => 'content',
      'third_party_settings[block_aria_landmark_roles][role]' => 'banner',
    ];
    $this->drupalPostForm($path, $edit, t('Save block'));

    // Ensure that the markup is there after adding a role and placing the
    // block.
    $this->assertSession()->responseContains($this->output);
  }

}
