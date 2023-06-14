<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Package;

class PackageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test get all packages
     *
     * @return void
     */
    public function testGetAllPackages()
    {
        Package::factory()->count(5)->create();

        $response = $this->get('/api/packages');

        $response->assertStatus(200);
        $response->assertJsonCount(5, 'data');
        // Assertion lainnya sesuai dengan respons yang diharapkan
    }

    /**
     * Test get package by ID
     *
     * @return void
     */
    public function testGetPackageById()
    {
        $package = Package::factory()->create();

        $response = $this->get('/api/packages/' . $package->id);

        $response->assertStatus(200);
        // Assertion lainnya sesuai dengan respons yang diharapkan
    }

    /**
     * Test create package
     *
     * @return void
     */
    public function testCreatePackage()
    {
        $data = [
            // Isi data JSON yang ingin Anda gunakan untuk membuat package
        ];

        $response = $this->post('/api/packages', $data);

        $response->assertStatus(201);
        // Assertion lainnya sesuai dengan respons yang diharapkan
    }

    /**
     * Test update package
     *
     * @return void
     */
    public function testUpdatePackage()
    {
        $package = Package::factory()->create();

        $data = [
            // Isi data JSON yang ingin Anda gunakan untuk memperbarui package
        ];

        $response = $this->put('/api/packages/' . $package->id, $data);

        $response->assertStatus(200);
        // Assertion lainnya sesuai dengan respons yang diharapkan
    }

    /**
     * Test partially update package
     *
     * @return void
     */
    public function testPartiallyUpdatePackage()
    {
        $package = Package::factory()->create();

        $data = [
            // Isi data JSON yang ingin Anda gunakan untuk memperbarui sebagian package
        ];

        $response = $this->patch('/api/packages/' . $package->id, $data);

        $response->assertStatus(200);
        // Assertion lainnya sesuai dengan respons yang diharapkan
    }

    /**
     * Test delete package
     *
     * @return void
     */
    public function testDeletePackage()
    {
        $package = Package::factory()->create();

        $response = $this->delete('/api/packages/' . $package->id);

        $response->assertStatus(204);
    }
}
