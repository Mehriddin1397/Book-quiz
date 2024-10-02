<form action="{{ route('test.verifyCode') }}" method="POST">
    @csrf
    <input type="text" name="code" placeholder="Test kodini kiriting" required>
    <button type="submit">Testni boshlash</button>
</form>
