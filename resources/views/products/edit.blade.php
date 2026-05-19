@include('products.form')

                    <input 
                        type="text" 
                        class="cyber-input form-control @error('teknologi') is-invalid @enderror" 
                        id="teknologi" 
                        name="teknologi" 
                        value="{{ old('teknologi', is_array($project->teknologi) ? implode(', ', $project->teknologi) : $project->teknologi) }}"
                        required>
                    @error('teknologi')
                        <div class="text-red-500 text-[10px] mt-1 font-bold uppercase italic">>> ERR_STACK_MISMATCH</div>
                    @enderror
                </div>

                <div class="mb-10">
                    <label for="link_project" class="input-label">
                        <span class="bg-pink-600 text-white px-1 font-body">04</span> TARGET_URL_REDIRECT
                    </label>
                    <input 
                        type="url" 
                        class="cyber-input form-control @error('link_project') is-invalid @enderror" 
                        id="link_project" 
                        name="link_project" 
                        value="{{ old('link_project', $project->link_project) }}">
                    @error('link_project')
                        <div class="text-red-500 text-[10px] mt-1 font-bold uppercase italic">>> ERR_URL_MALFORMED</div>
                    @enderror
                </div>

                <div class="flex flex-col sm:flex-row gap-2 w-full pt-6 justify-center">
                    <button type="submit" class="bg-green-400 text-black font-header px-5 py-1.5 text-sm uppercase tracking-tighter border-2 border-green-400 hover:bg-white hover:border-white transition-all">
                        EXECUTE_PATCH.EXE
                    </button>
                    
                    <a href="{{ route('dashboard.projects') }}" class="bg-zinc-800 text-pink-600 font-header px-5 py-1.5 text-sm uppercase tracking-tighter border-2 border-pink-600 hover:bg-pink-600 hover:text-white transition-all text-center">
                        ABORT_MISSION
                    </a>
                </div>
            </form>

            <div class="mt-6 pt-4 border-t border-zinc-800 text-[10px] text-zinc-600 font-bold uppercase italic">
                LAST_MODIFIED: {{ $project->updated_at->format('Y.m.d_H:i') }}
            </div>
        </div>

        <div class="mt-12">
            <a href="{{ route('dashboard.projects') }}" class="text-zinc-600 hover:text-green-400 text-xs uppercase font-bold tracking-widest transition-colors flex items-center gap-2">
                <span class="text-pink-500"><</span> ESC_TO_ROOT_DIR
            </a>
        </div>
    </div>
</div>
@endsection