<?php

namespace Test\Unit\Controller;

use App\Model\GenreModel;
use Test\Unit\BaseTest\ControllerTest;

class GenreControllerTest extends ControllerTest {
    /**
     * @var GenreModel|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $stub;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->stub = $this->createMock(GenreModel::class);
    }

    /**
     * Проверяем возврат массива из метода all()
     */
    public function testIndex()
    {
        $this->getTestIndex();
    }

    /**
     * Возвращаем объект при вызове одного жанра
     */
    public function testGet()
    {
        $this->getTestGet();
    }

    /**
     * Проверяем, что возвращается объект
     */
    public function testGetObject()
    {
        $this->getTestObject();
    }

    /**
     * Проверяем возвращается ли массив данных при построении запроса
     */
    public function testDataForStoreAndUpdate()
    {
        $this->getTestDataForStoreAndUpdate();
    }

    /**
     * Проверяем что данные будут ошибочны, если вернется не массив
     */
    public function testNotEqualsDataForStoreAndUpdate()
    {
        $this->getTestNotEqualsDataForStoreAndUpdate();
    }

    /**
     * Проверяем работу добавления
     * @return void
     */
    public function testStore()
    {
        $this->getTestCheckStore();
    }

    /**
     * Проверяем удаление
     *
     * @return void
     */
    public function testDelete()
    {
        $this->getTestDelete();
    }
}
