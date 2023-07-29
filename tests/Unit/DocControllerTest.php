<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Doc;
use Tests\TestCase as TestCase;


class DocControllerTest extends TestCase
{
    use HasFactory;

    public function testStore()
    {
        $doc = new Doc();
        $doc->title = 'Test Title';
        $doc->description = 'Test Description';
        $doc->save();
        $this->assertTrue($doc->save());
    }
    public function testShow()
    {
        $doc = Doc::factory()->create();
        $this->assertIsObject($doc);
    }

    public function testUpdate()
    {
        $doc = Doc::factory()->create();
        $doc->update(['title' => 'Test Title', 'description' => 'Test Description']);
        $this->assertTrue($doc->update());
    }
    public function testDelete()
    {

        $doc = Doc::factory()->create();
        $doc->delete();
        $this->assertNull($doc->delete());
    }
}