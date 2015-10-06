<div style="margin-top:30px;">
        Flytta markerade till:
        <select name="action-type" class="form-control">
            <option value="">Välj destination…</option>
            <option style="color:#ff0000;" value="tmpdelete">Papperskorgen</option>
            {$categoryPicker}
        </select>
        <button class="btn btn-submit" name="action" value="move-files" onclick="return confirm('Vill du flytta markerade objekt till vald destination?');">Flytta</button>
</div>
</form>
</div>
</article>
</div>