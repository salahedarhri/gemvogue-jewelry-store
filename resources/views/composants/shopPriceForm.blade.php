<form action="{{ route('shopPrixFilter')}}" class="flex flex-col text-md gap-3 py-4 border-b border-amber-700 border-opacity-20">

  @csrf
  <label for="prixRange">
    <input type="radio" name="prixRange" value="0-500" 
    onchange="this.form.submit()" class="focus:ring-second text-second"
    @if(isset($prixRange)){{ ($prixRange == '0-500')?'checked':''}}@endif >&nbsp; 0-500 Dh
  </label>
  
  <label for="prixRange">
    <input type="radio" name="prixRange" value="500-1000" 
    onchange="this.form.submit()" class="focus:ring-second text-second"
    @if(isset($prixRange)){{ ($prixRange == '500-1000')?'checked':''}}@endif >&nbsp; 500-1000 Dh
  </label>
  
  <label for="prixRange">
    <input type="radio" name="prixRange" value="1000-1500" 
    onchange="this.form.submit()" class="focus:ring-second text-second"
    @if(isset($prixRange)){{ ($prixRange == '1000-1500')?'checked':''}}@endif >&nbsp; 1000-1500 Dh
  </label>
  
  <label for="prixRange">
    <input type="radio" name="prixRange" value="1500-2000" 
    onchange="this.form.submit()" class="focus:ring-second text-second"
    @if(isset($prixRange)){{ ($prixRange == '1500-2000')?'checked':''}}@endif >&nbsp; 1500-2000 Dh
  </label>
  
  <label for="prixRange">
    <input type="radio" name="prixRange" value="2000+" 
    onchange="this.form.submit()" class="focus:ring-second text-second"
    @if(isset($prixRange)){{ ($prixRange == '2000+')?'checked':''}}@endif >&nbsp; 2000+ Dh
  </label>
  

</form>