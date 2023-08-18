<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
 xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<?php foreach ($articles as $article){    ?>
        <url>
            <loc>{{ url('/') }}/<?php echo $article['slug']; ?></loc>
        </url>
<?php } ?>
<?php foreach ($categories as $category){    ?>
    <url>
        <loc>{{ url('/') }}/category/<?php echo $category['slug']; ?></loc>
    </url>
<?php } ?>
<url>
    <loc>https://www.preproddev.com/</loc>
</url>
</urlset>
