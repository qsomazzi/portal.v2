<?php

namespace Portal\Component\Core;

/**
 * Trait Color.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
trait Color
{
    protected $colors = [
        'red'        => 'Red',
        'yellow'     => 'Yellow',
        'aqua'       => 'Aqua',
        'blue'       => 'Blue',
        'light-blue' => 'Light blue',
        'green'      => 'Green',
        'navy'       => 'Navy',
        'teal'       => 'Teal',
        'olive'      => 'Olive',
        'lime'       => 'Lime',
        'orange'     => 'Orange',
        'fuchsia'    => 'Fuchsia',
        'purple'     => 'Purple',
        'maroon'     => 'Maroon',
        'black'      => 'Black',
        'gray'       => 'Gray',
    ];

    /**
     * @return array
     */
    public function getColors()
    {
        return $this->colors;
    }
}
