<?php

namespace tests\unit\models;

use Codeception\Test\Unit;
use app\modules\user\models\User;

class NewUserTest extends Unit
{
    public function testFindUserById()
    {
        expect_that($user = User::findIdentity($this->getTestUser()->getId()));
        expect($user->username)->equals('admin');

        expect_not(User::findIdentity(0));
    }

    public function testFindUserByUsername()
    {
        expect_that(User::findByUsername('admin'));
        expect_not(User::findByUsername('not-admin'));
    }

    public function testValidateUser()
    {
        $user = $this->getTestUser();

        expect_that($user->getId());
        expect($user->getId())->notEmpty();

        expect_that($user->getAuthKey());
        expect($user->getAuthKey())->notEmpty();

        foreach (['username', 'first_name', 'last_name'] as $field) {
            expect_that($user->{$field});
            expect($user->{$field})->notEmpty();
        }

        expect_that($user->validatePassword('admin'));
        expect_not($user->validatePassword('123456'));        
    }

    private function getTestUser()
    {
        return User::findByUsername('admin');
    }
}
