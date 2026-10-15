<?php

namespace Webkul\NativeHouse\Sections;

use Webkul\Theme\Sections\SectionType;
use Webkul\Theme\SectionSchema;

class HeroBanner extends SectionType
{
    protected string $code = 'hero_banner';
    protected ?string $title = 'native-house::app.sections.hero-banner';
    protected string $icon = 'icon-image';

    public function getFields(): array
    {
        return [
            [
                'key' => 'slides',
                'type' => SectionSchema::REPEATER,
                'label' => trans('native-house::app.sections.slides'),
                'add_label' => trans('native-house::app.sections.add-slide'),
                'fields' => [
                    ['key' => 'image', 'type' => SectionSchema::IMAGE, 'label' => trans('native-house::app.sections.image')],
                    ['key' => 'heading', 'type' => SectionSchema::TEXT, 'label' => trans('native-house::app.sections.heading')],
                    ['key' => 'link', 'type' => SectionSchema::TEXT, 'label' => $this->label('link')],
                ],
            ],
        ];
    }
}