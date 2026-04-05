@php
    $selected = $selected ?? old('icon_class', '');
@endphp
<label class="form-label fw-semibold">Or use icon class (Boxicons)</label>
<select name="icon_class" class="form-select @error('icon_class') is-invalid @enderror">
    <option value="">— None —</option>
    <option value="bx bx-code-alt" @selected($selected === 'bx bx-code-alt')>bx bx-code-alt (Web)</option>
    <option value="bx bx-cloud" @selected($selected === 'bx bx-cloud')>bx bx-cloud</option>
    <option value="bx bx-shield" @selected($selected === 'bx bx-shield')>bx bx-shield (Security)</option>
    <option value="bx bx-data" @selected($selected === 'bx bx-data')>bx bx-data</option>
    <option value="bx bx-desktop" @selected($selected === 'bx bx-desktop')>bx bx-desktop</option>
    <option value="bx bx-trending-up" @selected($selected === 'bx bx-trending-up')>bx bx-trending-up</option>
    <option value="bx bx-mobile-alt" @selected($selected === 'bx bx-mobile-alt')>bx bx-mobile-alt</option>
    <option value="bx bx-palette" @selected($selected === 'bx bx-palette')>bx bx-palette</option>
</select>
<small class="text-muted d-block mt-1">Ignored if you upload an icon image. On edit, picking a class replaces a stored icon file.</small>
@error('icon_class')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
