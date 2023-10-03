<?php

namespace Tests\Feature\Controllers;

use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TestApiControllerTest extends TestCase
{
    // 本運用で使うときは、TeasCase側で工夫しながらRefreshDatabaseを使う
    use DatabaseMigrations;

    private const TEST_DATE = '2022-02-05 09:00:00';

    /**
     * test set up
     */
    public function setUp(): void
    {
        parent::setUp();
        Carbon::setTestNow(self::TEST_DATE);
    }

    /**
     * index test 200
     * @return void
     */
    public function testIndex200(): void
    {
        // Arrange
        $test = Test::newFactory()->create([
            'name' => 'hoge1',
            'comment' => 'hoge1'
        ]);

        // Act & Assert
        $this->getJson('/api/test')
            ->assertStatus(200);
    }

    /**
     * post test 200
     * @return void
     */
    public function testPost200(): void
    {
        // Act
        $res = $this->postJson('/api/test', [
            'name' => 'hoge1',
            'comment' => 'hoge1'
        ]);

        // Assert
        $res->assertStatus(201);
        $this->assertSame(1, Test::count());
        $this->assertDatabaseHas('tests', [
            'name' => 'hoge1',
            'comment' => 'hoge1',
            'created_at' => self::TEST_DATE,
            'updated_at' => self::TEST_DATE
        ]);
    }
}
