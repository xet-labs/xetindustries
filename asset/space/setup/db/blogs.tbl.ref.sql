CREATE TABLE `blogs` (
  `blog_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `status` ENUM('draft', 'published', 'archived', 'deleted') NOT NULL DEFAULT 'draft',
  `uid` INT UNSIGNED NOT NULL,
  `tags` INT UNSIGNED DEFAULT NULL,
  `title` VARCHAR(255) NOT NULL,
  `short_title` VARCHAR(255) DEFAULT NULL,
  `excerpt` TEXT DEFAULT NULL,
  `featured_image` VARCHAR(255) DEFAULT NULL,
  `path` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `meta_description` TEXT,
  `meta_keywords` TEXT,
  `meta_og` JSON DEFAULT NULL,
  `meta_ld` JSON DEFAULT NULL,
  FOREIGN KEY (uid) REFERENCES Users(uid)
);



INSERT INTO `XI`.`blogs` (
  status,
  category,
  uid,
  title,
  short_title,
  excerpt,
  featured_image,
  path,
  slug,
  meta_description,
  meta_keywords
)
VALUES (
  'published',
  NULL,
  1,
  'What is SEO? A beginner’s guide to search engine optimization',
  'What is SEO ?',
  "SEO is the strategic art of enhancing a website's visibility on search engines like Google, Bing, and Yahoo. It involves optimizing various elements to rank higher in search results, driving organic traffic and, ultimately, increasing the chances of converting visitors into customers.",
  'res/aset-blog/what-is-seo/img/what-is-seo.webp',
  'blog/what-is-seo',
  NULL,
  "A beginner's guide to understanding and implementing (SEO) Search Engine Optimization.",
  'what is SEO, Search Engine Optimization, what is website optimization, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad'
),(
	'published',
  NULL,
  1,
  'Passive income by sharing internet',
  NULL,
  "The Internet powers virtually every aspect of the modern economy, you can transform your Internet connection into a passive income stream by merely sharing your Internet connection",
  'res/aset-blog/passive-income-by-sharing-internet/img/passive-income-by-sharing-internet.webp',
  'blog/passive-income-by-sharing-internet/',
  NULL,
  "The Internet powers virtually every aspect of the modern economy, transform your Internet connection into a passive income stream by merely sharing your Internet connection",
  "how to make money online, ways to make maney online, xet, xet industries, XetIndustries, XetIndustries blog, Rishikesh Prasad"
)


SELECT * FROM blogs;





-- listing the foreign key references from tables
SELECT   TABLE_NAME,   COLUMN_NAME,   CONSTRAINT_NAME,   REFERENCED_TABLE_NAME,   REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = 'XI'   AND REFERENCED_TABLE_SCHEMA = 'XI';
