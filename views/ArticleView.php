<?php
//@TODO: Make template for article

class ArticleView extends View
{
    public function output()
    {
		if (isset($_GET['route']))
		{
			$sections = $this->model->getSectionContent(strip_tags($_GET['route']));
        }
		
        //Check to see if we returned anything for the page. GetSEctionContent() returns false if nothing found.
        if (isset($sections) && !empty($sections))
        {
            foreach ($sections as $items)
            {
                echo nl2br("<article>" 
                            . "<h3>" . $items->getTitle() . "</h3>" 
                            . "<p>" . $items->getContent());
                if ($items->getImagepath() != "")
                {
                    echo '<a href="./images/' . $items->getImagepath() . '"><img width="75" height="75" src="./images/' . $items->getImagepath() . '"></a>';
                }
                echo nl2br("</p>"
                            . "</article>");
            }
        }
        else
        {
            echo "<article><p>No content</p></article>";
        }
    } 
    
    public function outputHeader()
    {
        return $this->model->header;
    }
}
