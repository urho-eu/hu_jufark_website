<?php
class hu_juhfark_website_injector
{
    var $mvc = null;

    public function __construct()
    {
        $this->mvc = midgardmvc_core::get_instance();
    }

    /**
     * Template injector
     */
    public function inject_template(midgardmvc_core_request $request)
    {
        // We inject the template to provide the juhfark.hu styling
        $request->add_component_to_chain($this->mvc->component->get('hu_juhfark_website'), true);

        // set the page title
        $title = $this->mvc->configuration->site_name;

        $node = $request->get_node();

        if ($node->get_parent_node())
        {
            $title .= ' - ' . $this->mvc->i18n->get($this->mvc->configuration->nodes['children'][$node->name]['title'], $node->get_component());
        }
        $this->mvc->head->set_title($title);


    }
}
?>
