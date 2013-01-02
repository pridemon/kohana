{include file="samples/header.tpl"}
{include file="samples/header.page.tpl"}

<div class="container">  
    <div class="row">
        <h1><strong>404 Error:</strong> страница не найдена {$message}</h1> 
         
        <p>Запрощенная страница {$requested_page} не найдена.</p> 
         
        <p>It is either not existing, moved or deleted. 
        Make sure the URL is correct. </p> 
         
        <p>To go back to the previous page, click the Back button.</p> 
         
        <p><a href="{$path_web}">If you wanted to go to the main page instead, click here.</a></p>
    </div>
</div>

{include file="samples/footer.tpl"}