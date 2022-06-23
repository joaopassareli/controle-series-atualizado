<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRespositoryTest extends TestCase
{
    use RefreshDatabase;

    //Todo teste deve possuir pelo menos três etapas:
    //Arrange: onde é preparado o cenário de testes
    //Act: onde é executado o que se quer testar
    //Assert: onde verifica se o que foi executado retornou o resultado esperada.

    public function test_when_a_series_is_created_its_seasons_and_sepisodes_must_also_be_created()
    {
        //Arrange
        /** @var SeriesRepository $repository */
        $repository = $this->app->make(SeriesRepository::class);
        
        $request = new SeriesFormRequest();
        $request->nome = 'Nome da Série';
        $request->seasonsQty = 1;
        $request->episodesPerSeason = 1;

        //Act
        $repository->add($request);

        //Assert
        $this->assertDatabaseHas('series', ['nome' => 'Nome da Série']);
        $this->assertDatabaseHas('seasons', ['number' => 1]);
        $this->assertDatabaseHas('episodes', ['number' => 1]);
    }
}
