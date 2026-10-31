{{-- Shared fields for the create and edit customer forms.
     old() brings back what was typed if validation fails; the second value
     is the saved data (used on the edit page). --}}
<div class="field">
    <label for="full_name">Full Name</label>
    <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $customer->full_name ?? '') }}">
    @error('full_name')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email', $customer->email ?? '') }}">
    @error('email')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label for="phone">Phone (optional)</label>
    <input type="text" id="phone" name="phone" value="{{ old('phone', $customer->phone ?? '') }}">
    @error('phone')
        <div class="error">{{ $message }}</div>
    @enderror
</div>
