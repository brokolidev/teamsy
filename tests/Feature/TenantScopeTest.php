<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class TenantScopeTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /** @test * */
    public function 모델에테턴트아이디가모두들어가있는지확인()
    {
        $now = now();
        $this->artisan('make:model Test -m');

        $filename = $now->format('Y_m_d_His') . '_create_tests_table.php';

        $this->assertTrue(File::exists(database_path("migrations/{$filename}")));
        $this->assertStringContainsString(
            '$table->unsignedBigInteger(\'tenant_id\')->nullable()->index();',
            File::get(database_path("migrations/{$filename}"))
        );

        File::delete(database_path("migrations/{$filename}"));
        File::delete(app_path('Models/Test.php'));
    }

    /** @test * */
    public function 사용자는같은테넌트만볼수있음()
    {
        $tenant1 = Tenant::factory()->create();
        $tenant2 = Tenant::factory()->create();

        $user1 = User::factory()->create([
            'tenant_id' => $tenant1,
        ]);

        User::factory()->count(9)->create([
            'tenant_id' => $tenant1,
        ]);

        User::factory()->count(10)->create([
            'tenant_id' => $tenant2,
        ]);

        auth()->login($user1);

        $this->assertEquals(10, User::count());
    }

    /** @test * */
    public function 억지로다른테넌트아이디를넣어도_유저생성은자기구역내에서만가능()
    {
        $tenant1 = Tenant::factory()->create();
        $tenant2 = Tenant::factory()->create();

        $user1 = User::factory()->create([
            'tenant_id' => $tenant1,
        ]);

        auth()->login($user1);

        $createdUser = User::factory()->make();
        $createdUser->tenant_id = $tenant2->id;
        $createdUser->save();

        $this->assertTrue($createdUser->tenant_id === $user1->tenant_id);
    }

}
