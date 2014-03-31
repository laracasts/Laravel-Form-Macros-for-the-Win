<?php

namespace spec\Acme\Html;

use Illuminate\Html\HtmlBuilder;
use Illuminate\Routing\UrlGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormBuilderSpec extends ObjectBehavior {

    function let(UrlGenerator $urlGenerator)
    {
        $htmlBuilder = new HtmlBuilder;
        
        $this->beConstructedWith($htmlBuilder, $urlGenerator, null);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Html\FormBuilder');
    }

    function it_creates_a_text_field_block()
    {
        $this->textField('username', 'Username:')->shouldReturn(
            '<div class="form-group"><label for="username">Username:</label><input class="form-control" name="username" type="text" id="username"></div>'
        );
    }

    function it_creates_a_password_field_block()
    {
        // HOMEWORK
    }

}
