<?php

class DbOrderRepositoryTest extends PHPUnit_Framework_TestCase {

    private $repository;
    private $database;

    public function setUp()
    {
        $this->database = $this->mockDatabaseTable('orders');
        $this->repository = (new DbOrderRepository($this->database));
    }

	/** @test */
	public function creates_an_order_in_the_db()
	{
        $this->database->shouldReceive('insert')->once();

        $this->repository->create(new Order('Title', 'Desc'));
	}

    private function mockDatabaseTable($tableName)
    {
        $dbManager = Mockery::mock('Illuminate\Database\DatabaseManager');
        $dbManager->shouldReceive('table')->with($tableName)->once()->andReturn(Mockery::self());

        return $dbManager;
    }

}