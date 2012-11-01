  
  <?php 
  /*
  echo '<?xml version="1.0" encoding="utf-8"?>
    <?xml-stylesheet title="XSL formatting" type="text/xsl" href="http://www.akademia.ch/cms/dotclear/index.php?feed/rss2/xslt" ?>
    <rss version="2.0"
  xmlns:dc="http://purl.org/dc/elements/1.1/"
  xmlns:wfw="http://wellformedweb.org/CommentAPI/"
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
  <title>Le blog de "A table!"</title>
  <link>http://www.picadametles.ch/atable20/</link>
  <atom:link href="http://www.picadametles.ch/atable20/posts/rss/index.rss" rel="self" type="application/rss+xml"/>
  <description>Le blog de "A table!" sur www.picadametles.ch</description>';*/
  
  
  echo '<language>fr</language>
  <pubDate>' .date("D, d M Y h:i:s") .'</pubDate>
  <copyright>GPL</copyright>
  <docs>http://blogs.law.harvard.edu/tech/rss</docs>
  <generator>cakePHP</generator>';
  
  foreach ($posts as $post) {
    	$postTime = strtotime($post['Post']['created']);
    	$postLink = array(
    			'controller' => 'posts',
    			'action' => 'view',
    			'year' => date('Y', $postTime),
    			'month' => date('m', $postTime),
    			'day' => date('d', $postTime)
    			);
    	// You should import Sanitize
    	App::import('Sanitize');
    	// This is the part where we clean the body text for output as the description
    	// of the rss item, this needs to have only text to make sure the feed validates
    	$bodyText = preg_replace('=\(.*?\)=is', '', $post['Post']['body']);
    	$bodyText = $this->Text->stripLinks($bodyText);
    	$bodyText = Sanitize::stripAll($bodyText);
    	$bodyText = $this->Text->truncate($bodyText, 400, array(
    			'ending' => '...',
    			'exact' => true,
    			'html' => true,
    	));
    	echo $this->Rss->item(array(), array(
    			'title' => $post['Post']['title'],
    			'link' => $postLink,
    			'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
    			'description' => $bodyText,
    			'dc:creator' => $post['User']['email'],
    			'pubDate' => $post['Post']['created']));
    	#echo "\r\n";
    	echo "\n\n";
    }
    
    ?>