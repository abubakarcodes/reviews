@php
echo '<?xml version="1.0" encoding="UTF-8" ?>';
@endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
<loc>{{ route('home') }}</loc>
<changefreq>weekly</changefreq>
</url>
<url>
<loc>{{ route('login') }}</loc>
<changefreq>weekly</changefreq>
</url>
</urlset>

