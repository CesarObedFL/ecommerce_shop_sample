<?php

namespace Webkul\NativeHouse\Sections;

use Webkul\Theme\Sections\SectionType;
use Webkul\Theme\SectionSchema;

class HeroBanner extends SectionType
{
    /**
     * Code the section is stored under.
     */
    protected string $code = 'hero_banner';

    /**
     * Translation key of the name shown in the editor.
     */
    protected ?string $title = 'native-house::app.sections.hero-banner';

    /**
     * Icon class drawn on the type's tile.
     */
    protected string $icon = 'icon-image';

    /**
     * Whether a channel may hold only one section of this type.
     */
    protected bool $singleton = true;

    /**
     * The fields the editor draws.
     */
    public function getFields(): array
    {
        return [
            [
                'key'       => 'slides',
                'type'      => SectionSchema::REPEATER,
                'label'     => trans('native-house::app.sections.slides'),
                'add_label' => trans('native-house::app.sections.add-slide'),
                'fields'    => [
                    [
                        'key'   => 'image',
                        'type'  => SectionSchema::IMAGE,
                        'label' => trans('native-house::app.sections.image'),
                    ],
                    [
                        'key'   => 'heading',
                        'type'  => SectionSchema::TEXT,
                        'label' => trans('native-house::app.sections.heading'),
                    ],
                    [
                        'key'   => 'subheading',
                        'type'  => SectionSchema::TEXT,
                        'label' => trans('native-house::app.sections.subheading'),
                    ],
                    [
                        'key'   => 'link',
                        'type'  => SectionSchema::TEXT,
                        'label' => $this->label('link'),
                    ],
                    [
                        'key'   => 'button_text',
                        'type'  => SectionSchema::TEXT,
                        'label' => trans('native-house::app.sections.button-text'),
                    ],
                ],
            ],
        ];
    }

    /**
     * Clean the values before they are stored or previewed.
     */
    public function sanitize(array $options): array
    {
        if (array_key_exists('slides', $options) && is_array($options['slides'])) {
            foreach ($options['slides'] as $index => $slide) {
                if (array_key_exists('link', $slide)) {
                    $options['slides'][$index]['link'] = $this->sanitizeUrl($slide['link']);
                }
            }
        }

        return $options;
    }
}