<?php
class hu_juhfark_website_injector
{
    /**
     * Template injector
     */
    public function inject_template(midgardmvc_core_request $request)
    {
        // We inject the template to provide the juhfark.hu styling
        $request->add_component_to_chain(midgardmvc_core::get_instance()->component->get('hu_juhfark_website'), true);
    }
}
?>
