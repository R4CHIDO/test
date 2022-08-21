<?php

namespace Config;

use App\Filters\LoginFilter as FiltersLoginFilter;
use App\Filters\LoggedFilter as FiltersLoggedFilter;
use App\Filters\AdminFilter as FiltersAdminFilter;
use App\Filters\StudentFilter as FiltersStudentFilter;
use App\Filters\TeacherFilter as FiltersTeacherFilter;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'login'         => FiltersLoginFilter::class,
        'logged'         => FiltersLoggedFilter::class,
        'admin'         => FiltersAdminFilter::class,
        'student'         => FiltersStudentFilter::class,
        'teacher'         => FiltersTeacherFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        'login'    => ['before' => ['Dashboard/*', 'Login/Logout', 'Home/*', 'Modules/*', 'Posts/*', 'TimeTables/*', 'Users/*']],
        'logged'   => ['before' => ['Login/index', 'Login/signup', 'Login/signin', 'Login/Register']],
        'admin'    => ['before' => [
            'Modules/getModules', 'Modules/newModuleForm', 'Modules/deleteModule', 'Modules/newModule', 'Modules/editModuleForm', 'Posts/pendingPosts', 'Posts/acceptPost', 'Posts/removePost', 'TimeTables/newTimeTableForm',  'TimeTables/addTimeTable', 'TimeTables/editTimeTableForm', 'TimeTables/editTimeTable', 'Users/addMemberform', 'Users/memberRequests', 'Users/addMember', 'Users/', 'Users/',
        ]],
        'student'   => ['before' => ['Modules/getModulesForTrainer']],
        // 'teacher'   => ['before' => ['Modules/getModulesForTeacher', 'Modules/newFileForm', 'Modules/newFIle', 'Login/Register']],

    ];
}
