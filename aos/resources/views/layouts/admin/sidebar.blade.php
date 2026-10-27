<?php $group_id = Session::get('group_id'); ?>
<ul id="side-menu" class="sidebar-menu">
    <li><a href="{{ url('/admin') }}">Dashboard</a></li>
    
    <!--@if($group_id =='0')<li><a href="/cms_triveni/public/admin/media_releases">Media Releases</a></li>@endif-->
    
   
    
    {{-- @if($group_id =='0') --}}
    <li class="dropdown">
        <ul>
            <li><a href="{{'admin/year'}}">Year</a></li>
        </ul>
        
        <ul>
            <li class="dropdown"><a href="#">Investor Relations</a>
                <ul class="sub-menu">
                    <li><a href="{{ url('/admin/compostion_of_csr_committee') }}">Composition of CSR Committee</a></li>
                    <li><a href="{{ url('/admin/csr_policy') }}">CSR Policy</a></li>
                    <li><a href="{{ url('/admin/vigil_mechanism_policy') }}">Vigil Mechanism Policy</a></li>
                    <li><a href="{{ url('/admin/nrc_policy') }}">NRC Policy</a></li>
                    <li><a href="{{ url('/admin/code_of_independent_director') }}">Code of Independent Director</a></li>
                    <li><a href="{{ url('/admin/notice_of_agm') }}">Notice of AGM</a></li>
                    <li><a href="{{ url('/admin/annual_return') }}">Annual Return</a></li>
                    
                </ul>
            </li>
      
        
            
        </ul>
    </li>    
        {{-- @endif --}}
{{--     
     @if($group_id =='0')<li class="dropdown"><a href="#">PMS</a>
        
        <ul>
            <li class="dropdown"><a href="#">Catalog</a>
                <ul class="sub-menu">
                    <li><a href="{{ url('/admin/product_category') }}">Product Category</a></li>
                    <li><a href="{{ url('/admin/brands') }}">Brands</a></li>
                    <li><a href="{{ url('/admin/products') }}">Products</a></li>
                    
                </ul>
            </li>
      
        
            
        </ul>
    </li>@endif --}}
    
    
    
   
    
</ul>