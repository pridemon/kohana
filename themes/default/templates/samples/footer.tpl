   </div>
      <footer>
        {$current_shop->footer_code|default:'<p>copyleft 2013</p>'}
      </footer>

</div> <!-- /container -->
    
<div id="openidModal" class="modal hide fade span4" style="left: 33%;" tabindex="-1" role="dialog" aria-labelledby="openidModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="openidModalLabel">Вход</h3>
    </div>
    <div class="modal-body">
        {$ulogin}
    </div>
</div>

{$profile}