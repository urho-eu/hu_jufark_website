<?php
class hu_juhfark_website_injector
{
    var $mvc = null;
    var $component = 'hu_juhfark_website';

    public function __construct()
    {
        $this->mvc = midgardmvc_core::get_instance();
        $this->component = $this->mvc->configuration->nodes['component'];
    }

    /**
     * Template injector
     */
    public function inject_template(midgardmvc_core_request $request)
    {
        // We inject the template to provide the juhfark.hu styling
        $request->add_component_to_chain($this->mvc->component->get($this->component), true);

        // set the page title
        $title = $this->mvc->configuration->site_name;

        $node = $request->get_node();

        if (   is_object($node)
            && $node->get_parent_node())
        {
            $title .= ' - ' . $this->mvc->i18n->get($this->mvc->configuration->nodes['children'][$node->name]['title'], $this->component);
        }
        $this->mvc->head->set_title($title);
    }
}
?>
