<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserListTest extends TestCase
{
    public function testIsUserCanReadAllUsersFromAllDataProviders()
    {
        $this->json('GET', '/api/v1/users')
            ->assertOk()
            ->assertJsonStructure([
                [  'balance',
                    'currency' ,
                    'email' ,
                    'status' ,
                    'date' ,
                    'parentId' ,
                ],
            ]);
    }

    public function testIsdUserCanFilterUsersListByProvider()
    {
        $this->json(
            'GET',
            '/api/v1/users',
            ['provider' => 'DataProviderX']
        )
            ->assertOk()
            ->assertJsonCount(1)
            ->assertJsonStructure([
                [  'balance',
                    'currency' ,
                    'email' ,
                    'status' ,
                    'date' ,
                    'parentId' ,
                ],
            ]);
    }

    public function testIsdUserCanFilterUsersListByMinBalanceAndMaxBalance()
    {
        $this->json(
            'GET',
            '/api/v1/users',
            [
                'balanceMin' => 100,
                'balanceMax' => 500,
            ]
        )
            ->assertOk()
            ->assertJsonCount(2)
            ->assertJsonStructure([
                [  'balance',
                    'currency' ,
                    'email' ,
                    'status' ,
                    'date' ,
                    'parentId' ,
                ],
            ]);
    }

    public function testIsdUserCanFilterUsersListByAuthorisedStatus()
    {
        $this->json('GET', '/api/v1/users', [
            'status' => 'authorised',
        ])
            ->assertOk()
            ->assertJsonCount(2)
            ->assertJsonStructure([
                [  'balance',
                    'currency' ,
                    'email' ,
                    'status' ,
                    'date' ,
                    'parentId' ,
                ],
            ]);
    }

    public function testIsdUserCanFilterUsersListByDeclineStatus()
    {
        $this->json('GET', '/api/v1/users', [
            'status' => 'decline',
        ])->assertOk()->assertJsonCount(0);
    }

    public function testIsdUserCanFilterUsersListByStatusAndProvider()
    {
        $this->json('GET', '/api/v1/users', [
            'status'   => 'authorised',
            'provider' => 'DataProviderX',
        ])
            ->assertOk()
            ->assertJsonCount(1)->assertJsonStructure([
                [  'balance',
                    'currency' ,
                    'email' ,
                    'status' ,
                    'date' ,
                    'parentId' ,
                ],
            ]);
    }

    public function testIsdUserCanFilterUsersListByCurrency()
    {
        $this->json('GET', '/api/v1/users', [
            'currency'   => 'AED',
        ])
            ->assertOk()
            ->assertJsonCount(1)
            ->assertJsonStructure([
                [
                    'provider',
                    'balance',
                    'currency' ,
                    'email' ,
                    'status' ,
                    'date' ,
                    'parentId' ,
                ],
            ]);
    }
}
