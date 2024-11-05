<?php

namespace App\Filters;

use Illuminate\Http\Request;

/**
 * Class ListThingsFilter.
 *
 * @property string|null $name
 * @property string|null $description
 */
class ListThingsFilter
{
    /**
     * @var int
     */
    private const PER_PAGE = 10;

    /**
     * @param string|null $name
     * @param string|null $description
     * @param int $pageSize
     */
    public function __construct(
        public readonly string|null $name = null,
        public readonly string|null $description = null,
        public readonly int $pageSize = self::PER_PAGE
    ) {
    }

    /**
     * @param Request $request
     * @return self
     */
    public static function fromRequest(Request $request): self
    {
        return new self(
            name: $request->input('name'),
            description: $request->input('description'),
            pageSize: $request->input('page_size', self::PER_PAGE)
        );
    }
}
