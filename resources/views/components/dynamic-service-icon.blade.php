<?php 
$comp = "service-" . \Illuminate\Support\Str::slug($service->title); 
$defaultIcons = ['bx bx-code-alt', 'bx bx-cloud', 'bx bx-shield', 'bx bx-data', 'bx bx-desktop', 'bx bx-trending-up', ''];
?>
@if(view()->exists("components.icons.{$comp}") && (in_array($service->icon, $defaultIcons) || str_starts_with($service->icon, 'bi ')))
    @include("components.icons.{$comp}")
@else
    <i class="{{ $service->icon ?: 'bi bi-laptop' }}" style="font-size: 60px; color: #06D889;"></i>
@endif
