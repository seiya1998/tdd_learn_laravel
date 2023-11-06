<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\VacancyLevel;

class VacancyLevelTest extends TestCase
{
    /**
     * @param int $remainingCount
     * @param string $expectedMark
     * @dataProvider dataMark
     * @return void
     */
    public function testMark(int $remainingCount, string $expectedMark): void
    {
        $level = new VacancyLevel($remainingCount);
        $this->assertSame($expectedMark, $level->mark());
    }

    /**
     * @param int $remainingCount
     * @param string $expectedMark
     * @dataProvider dataSlug
     * @return void
     */
    public function testSlug(int $remainingCount, string $expectedSlug): void
    {
        $level = new VacancyLevel($remainingCount);
        $this->assertSame($expectedSlug, $level->slug());
    }

    public function dataMark(): array
    {
        return [
            '空きなし' => [
                'remainingCount' => 0,
                'expectedMark' => '×'
            ],
            '残りわずか' => [
                'remainingCount' => 4,
                'expectedMark' => '△'
            ],
            '空き十分' => [
                'remainingCount' => 5,
                'expectedMark' => '◎'
            ],
        ];
    }

    public function dataSlug(): array
    {
        return [
            'empty' => [
                'remainingCount' => 0,
                'expectedSlug' => 'empty'
            ],
            'few' => [
                'remainingCount' => 4,
                'expectedSlug' => 'few'
            ],
            'enough' => [
                'remainingCount' => 5,
                'expectedSlug' => 'enough'
            ],
        ];
    }
}
