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
        $response = $this->get('/api/packages');

        $response->assertStatus(200);
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
            "package_name" => "Nama Paket",
            "package_description" => "Deskripsi Paket",
            // Isi dengan validasi dan data lain sesuai kebutuhan
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
            "package_name" => "Nama Paket yang Diperbarui",
            // Isi dengan validasi dan data lain sesuai kebutuhan
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
            "package_description" => "Deskripsi Paket yang Diperbarui",
            // Isi dengan validasi dan data lain sesuai kebutuhan
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
