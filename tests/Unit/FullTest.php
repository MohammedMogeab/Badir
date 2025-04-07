<?php

namespace Tests\Unit;

use models\User;
use models\Address;
use models\Project;
use models\Campaign;
use models\Endowment;
use models\IslamicPayment;
use models\Categories;
use models\Partner;
use models\Report;
use models\User_Donate_Project;
use models\User_Donate_Campaign;
use models\User_Donate_Endowment;
use models\Notification;
use DateTime;

require_once __DIR__ . '/../../core/function.php';

// Authentication Tests
test('logIn function sets session correctly', function () {
    session_start();
    $user = ['email' => 'test@example.com'];
    logIn($user);
    expect($_SESSION['user']['email'])->toBe('test@example.com');
});

test('logOut function clears session', function () {
    session_start();
    $_SESSION['user'] = ['email' => 'test@example.com'];
    logOut();
    expect($_SESSION)->not()->toHaveKey('user');
});

// Routing Tests
test('urls function correctly checks URI', function () {
    $_SERVER["REQUEST_URI"] = "/home";
    expect(urls("/home"))->toBeTrue();
    expect(urls("/dashboard"))->toBeFalse();
});

test('user and address creation', function() {
    $address = new Address(
        'Test Street',
        'Test City',
        'Test Country'
    );

    $user = new User(
        1,
        'Test User',
        'regular',
        'default.jpg',
        'Test content',
        'Test Directorate',
        $address,
        'password123',
        '1234567890'
    );

    expect($user)->toBeInstanceOf(User::class);
    expect($user->getUserDetails())->toContain('Test User');
});

test('project creation', function() {
    $address = new Address('Test Street', 'Test City', 'Test Country');
    $user = new User(
        1,
        'Test User',
        'regular',
        'default.jpg',
        'Test content',
        'Test Directorate',
        $address,
        'password123',
        '1234567890'
    );

    $category = new Categories(
        1,
        'Test Category',
        'Test Description'
    );

    $project = new Project(
        $user,
        $category,
        1,
        'Test Project',
        1000.0,
        'project.jpg',
        'Short description',
        'Full description',
        '2024-04-06',
        '2024-05-06',
        1,
        1,
        'active',
        '2024-06-06'
    );

    expect($project)->toBeInstanceOf(Project::class);
});

// 3. Campaign Test
test('campaign creation', function() {
    $partner = new Partner(
        1,
        'Test Partner',
        'logo.jpg',
        'Partner Address',
        'partner@test.com',
        'Test Directorate',
        'Description',
        'More Information'
    );

    $address = new Address('Test Street', 'Test City', 'Test Country');
    $user = new User(
        1,
        'Test User',
        'regular',
        'default.jpg',
        'Test content',
        'Test Directorate',
        $address,
        'password123',
        '1234567890'
    );

    $campaign = new Campaign(
        $partner,
        $user,
        1,
        '2024-04-06',
        '2024-05-06',
        'Test Campaign',
        1,
        'Short Description',
        'active',
        1000.0,
        'Full Description',
        '2024-06-06',
        1,
        1
    );

    expect($campaign)->toBeInstanceOf(Campaign::class);
});

// 4. Endowment Test
test('endowment creation', function() {
    $address = new Address('Test Street', 'Test City', 'Test Country');
    $user = new User(
        1,
        'Test User',
        'regular',
        'default.jpg',
        'Test content',
        'Test Directorate',
        $address,
        'password123',
        '1234567890'
    );

    $endowment = new Endowment(
        $user,
        1,
        'endowment.jpg',
        'Test Endowment',
        'Short Description',
        '2024-04-06',
        'Test Directorate',
        1000.0,
        'Test Country',
        'active',
        '2024-05-06',
        'Full Description',
        '2024-06-06',
        1,
        1,
        'Test City'
    );

    expect($endowment)->toBeInstanceOf(Endowment::class);
});

// 5. Categories Test
test('category creation', function() {
    $category = new Categories(
        1,
        'Test Category',
        'Test Description'
    );
    expect($category)->toBeInstanceOf(Categories::class);
});

// 6. Partner Test
test('partner creation', function() {
    $partner = new Partner(
        1,
        'Test Partner',
        'logo.jpg',
        'Partner Address',
        'partner@test.com',
        'Test Directorate',
        'Description',
        'More Information'
    );
    expect($partner)->toBeInstanceOf(Partner::class);
});

// 7. Islamic Payment Test
test('islamic payment creation', function() {
    $address = new Address('Test Street', 'Test City', 'Test Country');
    $user = new User(
        1,
        'Test User',
        'regular',
        'default.jpg',
        'Test content',
        'Test Directorate',
        $address,
        'password123',
        '1234567890'
    );

    $payment = new IslamicPayment(
        $user,
        1,
        'Zakat Payment',
        1,
        1000.0,
        'Zakat',
        1000.0,
        1,
        new DateTime()
    );

    expect($payment)->toBeInstanceOf(IslamicPayment::class);
});

// 2. Categories Test
test('categories creation and functionality', function() {
    $category = new Categories(
        1,                     // categoryID
        'Charity Projects',    // name
        'Charitable projects for community development' // description
    );

    expect($category)->toBeInstanceOf(Categories::class);
});

// 3. Project Test
test('project creation and management', function() {
    $address = new Address('Test Street', 'Test City', 'Test Country');
    $creator = new User(
        2, 
        'Project Creator', 
        'regular', 
        'creator.jpg', 
        'Creator content', 
        'Creator Directorate', 
        $address, 
        'password123', 
        '1234567890'
    );
    $category = new Categories(
        2, 
        'Project Category', 
        'Project Category Description'
    );

    $project = new Project(
        $creator,
        $category,
        1,
        'Community Garden',
        50000.0,
        'garden.jpg',
        'Community garden project',
        'Detailed description of community garden project',
        date('Y-m-d'),
        date('Y-m-d', strtotime('+90 days')),
        1,
        2,
        'active',
        date('Y-m-d', strtotime('+100 days'))
    );

    expect($project)->toBeInstanceOf(Project::class);
    $project->addDonation($creator, 1000.0);
    expect($project->getTotalDonations())->toBe(1000.0);
    expect($project->isFullyFunded())->toBeFalse();
});

// 4. Partner Test
test('partner creation and management', function() {
    $partnerAddress = new Address(
        'Partner Street',
        'Partner City',
        'Partner Country'
    );

    $partner = new Partner(
        1,                      // partnerID
        'Test Partner',         // name
        'partner@test.com',     // email
        'active',               // status
        $partnerAddress,        // address
        'partner.jpg',          // image
        'Partner Description'   // description
    );

    expect($partner)->toBeInstanceOf(Partner::class);
});

// 5. Islamic Payment Test
test('islamic payment processing', function() {
    $address = new Address('Donor Street', 'Donor City', 'Donor Country');
    $donor = new User(
        3, 
        'Payment User', 
        'regular', 
        'donor.jpg', 
        'Donor content', 
        'Donor Directorate', 
        $address, 
        'password123', 
        '1234567890'
    );

    $payment = new IslamicPayment(
        1,
        1000.0,
        'zakat',
        date('Y-m-d'),
        $donor->userID,
        'completed'
    );

    expect($payment)->toBeInstanceOf(IslamicPayment::class);
});

// 6. Integration Test - Full Donation Workflow
test('complete donation workflow', function() {
    $address = new Address('Donor Street', 'Donor City', 'Donor Country');
    $donor = new User(
        4, 
        'Workflow User', 
        'regular', 
        'donor.jpg', 
        'Donor content', 
        'Donor Directorate', 
        $address, 
        'password123', 
        '1234567890'
    );

    $category = new Categories(
        3, 
        'Workflow Category', 
        'Workflow Category Description'
    );

    $project = new Project(
        $donor,
        $category,
        2,
        'Workflow Project',
        10000.0,
        'workflow.jpg',
        'Workflow project',
        'Detailed workflow project description',
        date('Y-m-d'),
        date('Y-m-d', strtotime('+30 days')),
        1,
        3,
        'active',
        date('Y-m-d', strtotime('+40 days'))
    );

    $project->addDonation($donor, 5000.0);
    expect($project->getTotalDonations())->toBe(5000.0);
    expect($project->isFullyFunded())->toBeFalse();
});

// 7. Campaign Test
test('campaign creation and management', function() {
    $address = new Address('Partner Street', 'Partner City', 'Partner Country');
    
    $partner = new Partner(
        1,
        'Campaign Partner',
        'partner.jpg',
        'Partner Address',
        'partner@test.com',
        'Partner Directorate',
        'Partner Description',
        'More info'
    );

    $creator = new User(
        5, 
        'Campaign Creator', 
        'regular', 
        'creator.jpg', 
        'Creator content', 
        'Creator Directorate', 
        $address, 
        'password123', 
        '1234567890'
    );

    $campaign = new Campaign(
        $partner,               // partner
        $creator,               // creator
        1,                      // campaignID
        date('Y-m-d'),         // startAt
        date('Y-m-d', strtotime('+30 days')), // endAt
        'Ramadan Campaign',     // name
        'campaign.jpg',         // photo
        'Campaign Description', // description
        'Full campaign description', // fullDescription
        date('Y-m-d', strtotime('+40 days')), // stopAt
        1,                      // partnerID
        1                       // campaignRequestID
    );

    expect($campaign)->toBeInstanceOf(Campaign::class);
});

// 8. Endowment Test
test('endowment creation and management', function() {
    $address = new Address('Endowment Street', 'Endowment City', 'Endowment Country');
    $user = new User(
        6, 
        'Endowment Creator', 
        'regular', 
        'creator.jpg', 
        'Creator content', 
        'Creator Directorate', 
        $address, 
        'password123', 
        '1234567890'
    );

    $endowment = new Endowment(
        $user,                  // user
        1,                      // endowmentID
        'endowment.jpg',       // photo
        'Education Endowment', // name
        'Endowment Description', // description
        'Full endowment description', // fullDescription
        date('Y-m-d'),         // startAt
        date('Y-m-d', strtotime('+30 days')), // endAt
        1000000.0,             // cost
        1,                      // categoryID
        1,                      // partnerID
        'Endowment City'       // city
    );

    expect($endowment)->toBeInstanceOf(Endowment::class);
});

// 9. User Notification Test
test('user notification system', function() {
    $address = new Address('Notif Street', 'Notif City', 'Notif Country');
    $user = new User(
        7, 
        'Notification User', 
        'regular', 
        'user.jpg', 
        'User content', 
        'User Directorate', 
        $address, 
        'password123', 
        '1234567890'
    );

    $notification = new Notification(
        1,                     
        1,                      
        'New Donation',         
        'Your donation was successful', 
        'success',             
        date('Y-m-d H:i:s'),   
        false                   
    );

    expect($notification)->toBeInstanceOf(Notification::class);
});


test('complete campaign donation workflow', function() {
    $creatorAddress = new Address('Creator St', 'Creator City', 'Creator Country');
    $creator = new User(
        8, 
        'Campaign Manager', 
        'admin', 
        'manager.jpg', 
        'Manager content', 
        'Manager Directorate', 
        $creatorAddress, 
        'password123', 
        '1234567890'
    );

    $category = new Categories(
        6, 
        'Integration Category', 
        'Integration Test Category'
    );

    $campaign = new Campaign(
        $creator,
        $category,
        2,
        'Integration Campaign',
        50000.0,
        'integration.jpg',
        'Integration test campaign',
        'Full integration test campaign',
        date('Y-m-d'),
        date('Y-m-d', strtotime('+60 days')),
        1,
        6,
        'active',
        date('Y-m-d', strtotime('+70 days'))
    );

    $donor1Address = new Address('Donor1 St', 'Donor City', 'Donor Country');
    $donor1 = new User(
        9, 
        'Donor One', 
        'regular', 
        'donor1.jpg', 
        'Donor content', 
        'Donor Directorate', 
        $donor1Address, 
        'password123', 
        '1234567890'
    );

    $donor2Address = new Address('Donor2 St', 'Donor City', 'Donor Country');
    $donor2 = new User(
        10, 
        'Donor Two', 
        'regular', 
        'donor2.jpg', 
        'Donor content', 
        'Donor Directorate', 
        $donor2Address, 
        'password123', 
        '1234567890'
    );

    $campaign->addDonation($donor1, 20000.0);
    $campaign->addDonation($donor2, 15000.0);

    expect($campaign->getTotalDonations())->toBe(35000.0);
    expect($campaign->isFullyFunded())->toBeFalse();
});

// 11. User Authentication Test
test('user authentication workflow', function() {
    $address = new Address('Auth Street', 'Auth City', 'Auth Country');
    $user = new User(
        11, 
        'Auth User', 
        'regular', 
        'auth.jpg', 
        'Auth content', 
        'Auth Directorate', 
        $address, 
        'password123', 
        '1234567890'
    );

    session_start();
    logIn(['email' => 'auth@test.com', 'id' => 11]);
    expect($_SESSION['user']['email'])->toBe('auth@test.com');

    logOut();
    expect($_SESSION)->not()->toHaveKey('user');
});

// 12. Report Generation Test
test('report generation functionality', function() {
    $address = new Address('Report Street', 'Report City', 'Report Country');
    $user = new User(
        12, 
        'Report User', 
        'admin', 
        'report.jpg', 
        'Report content', 
        'Report Directorate', 
        $address, 
        'password123', 
        '1234567890'
    );

    $category = new Categories(
        7, 
        'Report Category', 
        'Report Category Description'
    );

    $project = new Project(
        $user,
        $category,
        3,
        'Report Project',
        25000.0,
        'report_proj.jpg',
        'Report test project',
        'Report generation test project',
        date('Y-m-d'),
        date('Y-m-d', strtotime('+30 days')),
        1,
        7,
        'active',
        date('Y-m-d', strtotime('+40 days'))
    );

    $report = $project->generateReport(
        'monthly',
        'Monthly progress report for Report Project'
    );

    expect($report)->toContain('monthly');
    expect($report)->toContain('Report Project');
});

test('notification creation', function() {
    $notification = new Notification(
        1,                          // notificationID
        'Test notification body',   // content
        'Test Notification',        // title
        '2024-04-06 10:00:00'      // sendAt
    );

    expect($notification)->toBeInstanceOf(Notification::class);
    expect($notification->getNotificationDetails())->toContain('Test Notification');
});

test('session management', function() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    $_SESSION['user'] = [
        'id' => 1,
        'email' => 'test@example.com',
        'role' => 'admin'
    ];
    
    expect($_SESSION['user']['email'])->toBe('test@example.com');
    
    unset($_SESSION['user']);
    session_write_close();
});

test('session timeout', function() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    $_SESSION['last_activity'] = time() - 1800;
    $sessionTimeout = 1500;
    
    $isExpired = (time() - $_SESSION['last_activity']) > $sessionTimeout;
    expect($isExpired)->toBeTrue();
    
    unset($_SESSION['last_activity']);
    session_write_close();
});

test('session activity tracking', function() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    $_SESSION['user_activity'] = [
        'last_login' => date('Y-m-d H:i:s'),
        'ip_address' => '192.168.1.1',
        'user_agent' => 'Mozilla/5.0',
        'login_count' => 1
    ];
    
    expect($_SESSION['user_activity'])->toHaveKey('last_login');
    expect($_SESSION['user_activity']['login_count'])->toBe(1);
    
    unset($_SESSION['user_activity']);
    session_write_close();
});

test('session fixation', function() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    $oldSessionId = session_id();
    session_regenerate_id(true);
    $newSessionId = session_id();
    
    expect($newSessionId)->not()->toBe($oldSessionId);
    session_write_close();
});

test('csrf token', function() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    expect(strlen($_SESSION['csrf_token']))->toBe(64);
    
    unset($_SESSION['csrf_token']);
    session_write_close();
});

test('password strength', function() {
    $password = 'Weak';
    $requirements = [
        'length' => strlen($password) >= 8,
        'uppercase' => preg_match('/[A-Z]/', $password),
        'lowercase' => preg_match('/[a-z]/', $password),
        'numbers' => preg_match('/[0-9]/', $password),
        'special' => preg_match('/[^A-Za-z0-9]/', $password)
    ];
    
    expect($requirements['length'])->toBeFalse();
    expect(array_sum($requirements))->toBeLessThan(5);
});

test('file upload validation', function() {
    $filename = 'test.php';
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    
    expect(in_array($fileExtension, $allowedExtensions))->toBeFalse();
});

test('sql injection prevention', function() {
    $maliciousInput = "'; DROP TABLE users; --";
    $escapedInput = addslashes($maliciousInput);
    
    expect($escapedInput)->toContain("\\'");
    expect($escapedInput)->not()->toBe($maliciousInput);
});

test('request validation', function() {
    $requestData = [
        'email' => 'invalid-email',
        'password' => '123'
    ];
    
    $errors = [];
    
    if (!filter_var($requestData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }
    
    if (strlen($requestData['password']) < 8) {
        $errors['password'] = 'Password too short';
    }
    
    expect($errors)->toHaveKey('email');
    expect($errors)->toHaveKey('password');
});

test('cookie settings', function() {
    $options = [
        'expires' => time() + 3600,
        'path' => '/',
        'domain' => 'example.com',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Strict'
    ];
    
    expect($options['secure'])->toBeTrue();
    expect($options['httponly'])->toBeTrue();
    expect($options['samesite'])->toBe('Strict');
});

test('password hashing', function() {
    $password = 'SecurePassword123!';
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    expect(password_verify($password, $hashedPassword))->toBeTrue();
    expect(password_verify('WrongPassword', $hashedPassword))->toBeFalse();
});

test('request method validation', function() {
    $allowedMethods = ['GET', 'POST'];
    $requestMethod = 'PUT';
    
    expect(in_array($requestMethod, $allowedMethods))->toBeFalse();
});

test('file type validation', function() {
    $file = [
        'name' => 'document.pdf',
        'type' => 'application/pdf',
        'size' => 1024 * 1024 * 2 // 2MB
    ];
    
    $maxSize = 1024 * 1024 * 5; // 5MB
    $allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
    
    expect($file['size'])->toBeLessThan($maxSize);
    expect(in_array($file['type'], $allowedTypes))->toBeTrue();
});

test('api rate limiting', function() {
    $requests = [
        time() - 2,
        time() - 1,
        time()
    ];
    
    $rateLimit = [
        'limit' => 100,
        'window' => 3600,
        'remaining' => count($requests),
        'reset' => time() + 3600
    ];
    
    expect($rateLimit['remaining'])->toBe(3);
    expect($rateLimit['reset'])->toBeGreaterThan(time());
});

test('category with multiple projects', function() {
    $address = new Address('Test Street', 'Test City', 'Test Country');
    $user = new User(
        1,
        'Test User',
        'regular',
        'default.jpg',
        'Test content',
        'Test Directorate',
        $address,
        'password123',
        '1234567890'
    );

    $category = new Categories(
        1,
        'Multi-Project Category',
        'Category for multiple projects'
    );

    $project1 = new Project(
        $user,
        $category,
        1,
        'Project One',
        5000.0,
        'project1.jpg',
        'First project in category',
        'Detailed description of first project',
        '2024-04-06',
        '2024-05-06',
        1,
        1,
        'active',
        '2024-06-06'
    );

    $project2 = new Project(
        $user,
        $category,
        2,
        'Project Two',
        7000.0,
        'project2.jpg',
        'Second project in category',
        'Detailed description of second project',
        '2024-04-06',
        '2024-05-06',
        1,
        1,
        'active',
        '2024-06-06'
    );

    expect($project1)->toBeInstanceOf(Project::class);
    expect($project2)->toBeInstanceOf(Project::class);
});

test('endowment with multiple donations', function() {
    $address = new Address('Test Street', 'Test City', 'Test Country');
    $user = new User(
        1,
        'Test User',
        'regular',
        'default.jpg',
        'Test content',
        'Test Directorate',
        $address,
        'password123',
        '1234567890'
    );

    $endowment = new Endowment(
        $user,
        1,
        'endowment.jpg',
        'Multi-Donation Endowment',
        'Short Description',
        '2024-04-06',
        'Test Directorate',
        10000.0,
        'Test Country',
        'active',
        '2024-05-06',
        'Full Description',
        '2024-06-06',
        1,
        1,
        'Test City'
    );

    expect($endowment)->toBeInstanceOf(Endowment::class);
    expect($endowment->getEndowmentDetails())->toContain('Multi-Donation Endowment');
});

test('project report generation', function() {
    $address = new Address('Test Street', 'Test City', 'Test Country');
    $user = new User(
        1,
        'Test User',
        'regular',
        'default.jpg',
        'Test content',
        'Test Directorate',
        $address,
        'password123',
        '1234567890'
    );

    $category = new Categories(
        1,
        'Test Category',
        'Test Description'
    );

    $project = new Project(
        $user,
        $category,
        1,
        'Report Test Project',
        5000.0,
        'project.jpg',
        'Project for report testing',
        'Testing project report generation',
        '2024-04-06',
        '2024-05-06',
        1,
        1,
        'active',
        '2024-06-06'
    );

    $report = $project->generateReport('progress', 'Project progress report content');
    expect($report)->toContain('progress');
});

test('multiple islamic payments', function() {
    $address = new Address('Test Street', 'Test City', 'Test Country');
    $user = new User(
        1,
        'Test User',
        'regular',
        'default.jpg',
        'Test content',
        'Test Directorate',
        $address,
        'password123',
        '1234567890'
    );

    $payment1 = new IslamicPayment(
        $user,
        1,
        'Zakat Payment',
        1,
        1000.0,
        'Zakat',
        1000.0,
        1,
        new DateTime()
    );

    $payment2 = new IslamicPayment(
        $user,
        2,
        'Sadaqah Payment',
        1,
        500.0,
        'Sadaqah',
        500.0,
        1,
        new DateTime()
    );

    expect($payment1)->toBeInstanceOf(IslamicPayment::class);
    expect($payment2)->toBeInstanceOf(IslamicPayment::class);
    expect($payment1->getPaymentDetails())->toContain('1000');
    expect($payment2->getPaymentDetails())->toContain('500');
});

test('user authentication and session', function() {
    $address = new Address('Test Street', 'Test City', 'Test Country');
    $user = new User(
        1,
        'Test User',
        'regular',
        'default.jpg',
        'Test content',
        'Test Directorate',
        $address,
        'password123',
        '1234567890'
    );

    session_start();
    logIn(['id' => 1, 'email' => 'test@example.com']);
    expect($_SESSION['user']['email'])->toBe('test@example.com');

    logOut();
    expect($_SESSION)->not()->toHaveKey('user');
});

test('multiple user donations to project', function() {
    $address1 = new Address('Donor1 Street', 'Donor City', 'Donor Country');
    $donor1 = new User(
        1,
        'Donor One',
        'regular',
        'donor1.jpg',
        'Donor content',
        'Donor Directorate',
        $address1,
        'password123',
        '1234567890'
    );

    $address2 = new Address('Donor2 Street', 'Donor City', 'Donor Country');
    $donor2 = new User(
        2,
        'Donor Two',
        'regular',
        'donor2.jpg',
        'Donor content',
        'Donor Directorate',
        $address2,
        'password123',
        '9876543210'
    );

    $category = new Categories(
        1,
        'Test Category',
        'Test Description'
    );

    $project = new Project(
        $donor1,
        $category,
        1,
        'Multi-Donor Project',
        10000.0,
        'project.jpg',
        'Multi-donor project test',
        'Testing multiple donations to a single project',
        '2024-04-06',
        '2024-05-06',
        1,
        1,
        'active',
        '2024-06-06'
    );

    $project->addDonation($donor1, 3000.0);
    $project->addDonation($donor2, 4000.0);

    expect($project->getTotalDonations())->toBe(7000.0);
    expect($project->isFullyFunded())->toBeFalse();
});

test('project state transitions', function() {
    $address = new Address('Test Street', 'Test City', 'Test Country');
    $user = new User(
        1,
        'Test User',
        'regular',
        'default.jpg',
        'Test content',
        'Test Directorate',
        $address,
        'password123',
        '1234567890'
    );

    $category = new Categories(1, 'Test Category', 'Test Description');
    
    $project = new Project(
        $user,
        $category,
        1,
        'State Test Project',
        5000.0,
        'project.jpg',
        'Short description',
        'Full description',
        '2024-04-06',
        '2024-05-06',
        1,
        1,
        'active',
        '2024-06-06'
    );

    $project->changeState('paused');
    $project->changeState('completed');
    
    expect($project->generateReport('status', ''))->toContain('completed');
});

test('campaign with multiple partners', function() {
    $partner1 = new Partner(
        1,
        'Partner One',
        'logo1.jpg',
        'Partner1 Address',
        'partner1@test.com',
        'Partner1 Directorate',
        'Partner1 Description',
        'More Information 1'
    );

    $partner2 = new Partner(
        2,
        'Partner Two',
        'logo2.jpg',
        'Partner2 Address',
        'partner2@test.com',
        'Partner2 Directorate',
        'Partner2 Description',
        'More Information 2'
    );

    $address = new Address('Test Street', 'Test City', 'Test Country');
    $user = new User(
        1,
        'Test User',
        'regular',
        'default.jpg',
        'Test content',
        'Test Directorate',
        $address,
        'password123',
        '1234567890'
    );

    $campaign = new Campaign(
        $partner1,
        $user,
        1,
        '2024-04-06',
        '2024-05-06',
        'Multi-Partner Campaign',
        'campaign.jpg',
        'Multi-partner campaign test',
        'Testing campaign with multiple partners',
        '2024-06-06',
        1,
        1
    );

    expect($campaign)->toBeInstanceOf(Campaign::class);
});

test('input sanitization', function() {
    $maliciousInput = "<script>alert('xss')</script>";
    $sanitizedInput = htmlspecialchars($maliciousInput, ENT_QUOTES, 'UTF-8');
    
    expect($sanitizedInput)->not()->toContain('<script>');
    expect($sanitizedInput)->toContain('&lt;script&gt;');
});

test('access token', function() {
    $token = bin2hex(random_bytes(32));
    $expiration = time() + 3600;
    
    $tokenData = [
        'token' => $token,
        'expiration' => $expiration,
        'user_id' => 1
    ];
    
    expect(strlen($token))->toBe(64);
    expect($tokenData['expiration'])->toBeGreaterThan(time());
});