<?php
/*--------------------
https://github.com/billiemead/activeecommerce-form-builder.git
Licensed under the GNU General Public License v3.0
Author: Billie Mead (billiemead.com)
Last Updated: 02/20/2021
----------------------*/
namespace billiemead\FormBuilder\Events\Form;

use billiemead\FormBuilder\Models\Form;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class FormUpdated
{
    use Queueable, SerializesModels;

    /**
     * The updated form
     *
     * @var billiemead\FormBuilder\Models\Form
     */
    public $form;

    /**
     * Create a new event instance.
     *
     * @param billiemead\FormBuilder\Models\Form $form
     * @return void
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }
}
