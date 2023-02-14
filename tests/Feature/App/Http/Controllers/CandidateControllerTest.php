<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Candidate;
use App\Models\Hobby;
use Tests\TestCase;

class CandidateControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $candidate = Candidate::factory()->create([
            'name' => 'Pedro Emanuel',
            'email' => 'pedro.emanuel@teste.com',
            'state' => 'Rio de Janeiro',
            'city' => 'Rio de Janeiro',
            'hobbies' => 'Leitura, Cozinhar',
        ]);

        $response = $this->get(route('candidate.index'));

        $response->assertStatus(200);

        $response->assertViewHas('candidates');

        $candidates = $response->viewData('candidates');

        $this->assertTrue($candidates->contains($candidate));
    }

    public function testCreate()
    {
        $response = $this->get(route('candidate.create'));

        $response->assertStatus(200);
        $response->assertViewIs('candidates.create');
        $response->assertViewHas(['states', 'hobbies']);
    }

    public function testStore()
    {
        $data = [
            'name' => 'Pedro Emanuel',
            'email' => 'pedro.emanuel@teste.com',
            'state' => 'Rio de Janeiro',
            'city' => 'Rio de Janeiro',
            'hobbies' => ['Leitura, Cozinhar'],
        ];

        $response = $this->post(route('candidate.store'), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('candidate.index'));
        $response->assertSessionHas('flash_message', 'Candidate Successfully Added!');

        $candidate = Candidate::where('email', $data['email'])->first();

        $this->assertNotNull($candidate);
        $this->assertEquals($data['name'], $candidate->name);
        $this->assertEquals($data['email'], $candidate->email);
        $this->assertEquals($data['state'], $candidate->state);
        $this->assertEquals($data['city'], $candidate->city);
        $this->assertEquals(implode(', ', $data['hobbies']), $candidate->hobbies);
    }

    public function testShow()
    {
        $candidate = Candidate::factory()->create([
            'name' => 'Pedro Emanuel',
            'email' => 'pedro.emanuel@teste.com',
            'state' => 'Rio de Janeiro',
            'city' => 'Rio de Janeiro',
            'hobbies' => 'Leitura, Cozinhar',
        ]);

        $response = $this->get('/candidate/' . $candidate->id);

        $response->assertStatus(200);
        $response->assertSee(ucwords($candidate->name));
        $response->assertSee($candidate->email);
        $response->assertSee($candidate->state);
        $response->assertSee($candidate->city);
        $response->assertSee($candidate->hobbies);

        ob_end_clean();
    }

    public function testEdit()
    {
        $candidate = Candidate::factory()->create([
            'name' => 'Pedro Emanuel',
            'email' => 'pedro.emanuel@teste.com',
            'state' => 'Rio de Janeiro',
            'city' => 'Rio de Janeiro',
            'hobbies' => 'Leitura, Cozinhar',
        ]);

        $response = $this->get('/candidate/' . $candidate->id . '/edit');

        $response->assertStatus(200);
        $response->assertSee($candidate->name);
        $response->assertSee($candidate->email);

        $newName = 'Fulano da Silva';
        $newEmail = 'fulano.silva@example.com';
        $newState = 'New State';
        $newCity = 'New City';
        $newHobbies = ['Viagens', 'Esportes'];

        $response = $this->patch('/candidate/' . $candidate->id, [
            'name' => $newName,
            'email' => $newEmail,
            'state' => $newState,
            'city' => $newCity,
            'hobbies' => $newHobbies
        ]);

        $response->assertRedirect('/candidate');

        $this->assertDatabaseHas('candidates', [
            'id' => $candidate->id,
            'name' => $newName,
            'email' => $newEmail,
            'state' => $newState,
            'city' => $newCity,
            'hobbies' => implode(", ", $newHobbies)
        ]);
    }

    public function testUpdate()
    {
        $candidate = Candidate::factory()->create([
            'name' => 'Pedro Emanuel',
            'email' => 'pedro.emanuel@teste.com',
            'state' => 'Rio de Janeiro',
            'city' => 'Rio de Janeiro',
            'hobbies' => 'Leitura, Cozinhar',
        ]);

        $newName = 'Pedro Emanuel Silva';
        $newEmail = 'pedro.silva@teste.com';
        $newState = 'São Paulo';
        $newCity = 'São Paulo';
        $newHobbies = ['Leitura', 'Esportes'];

        $response = $this->put(route('candidate.update', $candidate), [
            'name' => $newName,
            'email' => $newEmail,
            'state' => $newState,
            'city' => $newCity,
            'hobbies' => $newHobbies
        ]);

        $response->assertRedirect(route('candidate.index'));
        $response->assertSessionHas('flash_message', 'Candidate Successfully Updated!');

        $updatedCandidate = Candidate::find($candidate->id);
        $this->assertEquals($newName, $updatedCandidate->name);
        $this->assertEquals($newEmail, $updatedCandidate->email);
        $this->assertEquals($newState, $updatedCandidate->state);
        $this->assertEquals($newCity, $updatedCandidate->city);
        $this->assertEquals('Leitura, Esportes', $updatedCandidate->hobbies);
    }

    public function testDestroy()
    {
        $candidate = Candidate::factory()->create([
            'name' => 'Pedro Emanuel',
            'email' => 'pedro.emanuel@teste.com',
            'state' => 'Rio de Janeiro',
            'city' => 'Rio de Janeiro',
            'hobbies' => 'Leitura, Cozinhar',
        ]);

        $this->delete('/candidate/' . $candidate->id)
            ->assertSessionHas('flash_message', 'Candidate Successfully Deleted!');

        $this->assertNull(Candidate::find($candidate->id));
    }
}
