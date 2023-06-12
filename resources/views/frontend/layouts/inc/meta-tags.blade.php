<meta name="title" content="{{ isset($meta_title) ? $meta_title . ' | ' . config('app.name') : '' }}" />
<meta name="description" content="{{ isset($meta_description) ? $meta_description : '' }}" />
<!-- Twitter Tages -->
<meta name="twitter:card" content="{{ isset($h1) ? $h1 : '' }}" />
<meta name="twitter:site" content="{{ '@' . config('app.domain') }}" />
<meta name="twitter:title" content="{{ isset($meta_title) ? $meta_title : '' }}" />
<meta name="twitter:description" content="{{ isset($meta_description) ? $meta_description : '' }}" />
<!-- Facebook Tages -->
<meta property="og:url" content="{{ isset($page_url) ? $page_url : '' }}" />
<meta property="og:site_name" content="{{ '@' . config('app.domain') }}" />
<meta property="og:type" content="{{ isset($h1) ? $h1 : '' }}" />
<meta property="og:title" content="{{ isset($meta_title) ? $meta_title : '' }}" />
<meta property="og:description" content="{{ isset($meta_description) ? $meta_description : '' }}" />
<!-- Meta Tags -->
<link rel="canonical" href="{{ isset($page_url) ? $page_url : '' }}" />
<meta name="robots" content="INDEX,FOLLOW">
<meta property="og:image" content="{{ isset($social_image) ? $social_image : asset('assets/img/logo/logo.png') }}" />
