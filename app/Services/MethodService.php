<?php

namespace App\Services;

use App\Models\Shortcode;

use Illuminate\Support\Facades\Log;

class MethodService
{
    /**
     * Handle shortcode and route to specific functions based on shortcode type.
     *
     * @param string $shortcode
     * @param string|null $key
     * @return string
     */
    public function handleShortcode($shortcode, $key = null)
    {
       // Debugging - Log the incoming shortcode
       \Log::info('Shortcode Handling', ['shortcode' => $shortcode]);

       if (preg_match('/\[(\w+[-\w]*)(.*?)\]/', $shortcode, $matches)) {
        $shortcodeName = $matches[1];  // Extract the shortcode name
        $attributesStr = trim($matches[2]); // Extract the attributes
        
    } else {
        return "<p>Invalid shortcode format.</p>";
    }
    
                // Parse attributes into key-value pairs
            $attributes = $this->parseAttributes($attributesStr);
            $code_id = $attributes['code_id'] ?? null;  // Extract the 'code_id' attribute

    
                    // Log for debugging purposes
                \Log::info('Shortcode Parsing', ['shortcodeName' => $shortcodeName, 'code_id' => $code_id]);

                if (!$code_id) {
                    \Log::warning('Missing code_id', ['shortcodeName' => $shortcodeName]);
                    return "<p>Missing code_id attribute.</p>";
                }
    
        // Find the content from the database using shortcode name and code_id
        $content = Shortcode::where('code_id', $code_id)
                            ->where('status', 1)
                            ->first();
      
        \Log::info('Shortcode Content', ['content' => $content]);
    
        // Handle if the content is not found
        if (!$content) {
            \Log::error('Shortcode not found', ['shortcodeName' => $shortcodeName, 'code_id' => $code_id]);
            return "<p>Shortcode not found for code_id {$code_id}.</p>";
        }
    
        // Handle different shortcodes based on the type
        switch ($shortcodeName) {
            case 'menu':
                return $this->getMenuData($content->details, $attributes);
            case 'forms':
                return $this->getArtFormData($content->details, $attributes);
            case 'minicart':
                return $this->getMiniCart();
            case 'myaccountmenu':
                return $this->getAccountDD();
           
           case 'service':
                    return $this->getServiceData();


            case 'product':
                return $this->getProductData();
            case 'sortcode-menu-art': // Handle 'sortcode-menu-art'
                return $this->getMenuData($content->details, $attributes); // Modify as needed for this shortcode
         
                case 'sortcode-product-art': // Handle 'sortcode-menu-art'
                    return $this->getProductData($content->details, $attributes); // Modify as needed for this shortcode
            case 'sortcode-service-art': // Handle 'sortcode-menu-art'
                        return $this->getServiceData($content->details, $attributes); // Modify as needed for this shortcode
                default:
                \Log::warning('Unsupported Shortcode Type', ['shortcodeName' => $shortcodeName]);
                return "<p>Shortcode type '{$shortcodeName}' not supported.</p>";
        }
    }

    /**
     * Parse attributes string into key-value pairs.
     *
     * @param string $attributesStr
     * @return array
     */
    private function parseAttributes($attributeString)
    {
        $attributes = [];
        preg_match_all('/(\w+)=["\']?([^"\']+)["\']?/', $attributeString, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $attributes[$match[1]] = $match[2]; // Add key-value pairs to attributes array
        }
        return $attributes;
    }
    /**
     * Get menu data.
     * Decode the details field if it contains JSON.
     */
    protected function getMenuData($details, $attributes = [])
    {
        // Check if the details field is JSON
        $decodedDetails = json_decode($details, true);

        // If JSON is valid, handle it accordingly
        if (is_array($decodedDetails)) {
            $html = '<ul>';
            foreach ($decodedDetails as $item) {
                $text = $item['text'] ?? 'Untitled';
                $href = $item['href'] ?? '#';
                $html .= "<li><a href='{$href}'>{$text}</a></li>";
            }
            $html .= '</ul>';
            return $html;
        }

        return "<p>Invalid menu data.</p>";
    }


    protected function getProductData($details, $attributes = [])
{
   // Use code_id instead of product_id
   $code_id = $attributes['code_id'] ?? null;

   if (!$code_id) {
       return "<p>Missing code_id attribute for sortcode-product-art shortcode.</p>";
   }

   // Fetch the content using the code_id from the database
   $content = \App\Models\Shortcode::where('code_id', $code_id)->first();

   if (!$content) {
       return "<p>Content not found for code_id {$code_id}.</p>";
   }

   // Process and return HTML using the content details
   return "<div class='product'>
               <h3>{$content->name}</h3>
               <p>{$content->details}</p>
               <p>{$content->price}</p>
           </div>";
}


protected function getServiceData($details, $attributes = [])
{
   // Use code_id instead of service_id
   $code_id = $attributes['code_id'] ?? null;

   if (!$code_id) {
       return "<p>Missing code_id attribute for sortcode-service-art shortcode.</p>";
   }

   // Fetch the content using the code_id from the database
   $content = \App\Models\Shortcode::where('code_id', $code_id)->first();

   if (!$content) {
       return "<p>Content not found for code_id {$code_id}.</p>";
   }

   // Process and return HTML using the content details
   return "<div class='service'>
               <h3>{$content->name}</h3>
               <p>{$content->details}</p>
               <p>{$content->price}</p>
           </div>";
}

protected function getArtFormData($details, $attributes = [])
{
    $formId = $attributes['form_id'] ?? null;

    if (!$formId) {
        return "<p>Missing form_id attribute.</p>";
    }

    $form = \App\Models\Form::find($formId);

    if (!$form) {
        return "<p>Form not found for ID {$formId}.</p>";
    }

    return view('forms.template', ['form' => $form])->render();
}

public function processShortcodes($content)
{
    \Log::info('Processing Content:', ['content' => $content]);
    
    return preg_replace_callback(
        '/\[(.*?)\]/', // Matches shortcode patterns like [shortcode-name attributes]
        function ($matches) {
            \Log::info('Matched Shortcode:', ['shortcode' => $matches[0]]);
            return $this->handleShortcode($matches[0]); // Process each shortcode
        },
        $content
    );
}

}
