public function handle($request, Closure $next, $role)
{
    if(!$this->auth->check())
    {
        return redirect()->to('/login')
            ->with('status', 'success')
            ->with('message', 'Please login.');
    }

    if($role == 'all')
    {
        return $next($request);
    }

    if( $this->auth->guest() || !$this->auth->user()->hasRole($role))
    {
        abort(403);
    }
    
    return $next($request);
}
