<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
 xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<url>
    <loc>https://www.preproddev.com/</loc>
    <lastmod>{{ date('Y-m-d') }}</lastmod>
</url>

<?php foreach ($categories as $category){    ?>
        <url>
            <loc>{{ url('/') }}/category/<?php echo $category['slug']; ?></loc>
            <lastmod>
            {{ date('Y-m-d') }}</lastmod>
        </url>
<?php } ?>
<?php foreach ($articles as $article){    ?>
        <url>
            <loc>{{ url('/') }}/<?php echo $article['slug']; ?></loc>
            <lastmod>{{ date('Y-m-d') }}</lastmod>
        </url>
<?php } ?>
<url>
    <loc>https://www.preproddev.com/hakkimizda</loc>
    <lastmod>{{ date('Y-m-d') }}</lastmod>
</url>
<url>
    <loc>https://www.preproddev.com/iletisim</loc>
    <lastmod>{{ date('Y-m-d') }}</lastmod>
</url>
</urlset>
