
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
    <h3 class="section-title">{{ session()->get('language') == 'portuguese' ? 'Fique Atento' : 'Newsletters' }}</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <p>{{ session()->get('language') == 'portuguese' ? 'Receba Nossas Ofertas' : 'Sign Up for Our Newsletter!' }}</p>
        <form>
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1"
                    placeholder="{{ session()->get('language') == 'portuguese' ? 'Inscreva-se Agora Mesmo' : 'Subscribe to our newsletter' }}">
            </div>
            <button class="btn btn-primary">{{ session()->get('language') == 'portuguese' ? 'Inscrever-se' : 'Subscribe' }}</button>
        </form>
    </div><!-- /.sidebar-widget-body -->
</div>