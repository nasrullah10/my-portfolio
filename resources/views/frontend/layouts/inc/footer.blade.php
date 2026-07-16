@php
    $footerInfo = \App\Models\FooterInfo::first();
    $footerIcons = \App\Models\FooterSocialLink::all();
    $footerUsefulLinks = \App\Models\FooterUsefulLink::all();
    $footerContact = \App\Models\FooterContactInfo::first();
    $footerHelpLinks = \App\Models\FooterHelpLink::all();
@endphp

<footer class="nx-footer">
    <div class="nx-container">
        <div class="nx-footer__grid">
            <div class="nx-footer__brand">
                <a class="nx-logo nx-logo--footer" href="{{ route('home') }}">
                    <span class="nx-logo__mark">N</span><span class="nx-logo__text">asrullah</span>
                </a>
                <p>{{ $footerInfo->info }}</p>
                <div class="nx-footer__social">
                    @foreach ($footerIcons as $icon)
                        <a href="{{ $icon->url }}" aria-label="Social"><i class="{{ $icon->icon }}"></i></a>
                    @endforeach
                </div>
            </div>

            <div>
                <h4>Useful Link</h4>
                <ul>
                    @foreach ($footerUsefulLinks as $usefulLink)
                        <li><a href="{{ $usefulLink->url }}">{{ $usefulLink->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4>Contact</h4>
                <ul>
                    <li>{{ $footerContact->address }}</li>
                    <li><a href="tel:{{ $footerContact->phone }}">{{ $footerContact->phone }}</a></li>
                    <li><a href="mailto:{{ $footerContact->email }}">{{ $footerContact->email }}</a></li>
                </ul>
            </div>

            <div>
                <h4>Help</h4>
                <ul>
                    @foreach ($footerHelpLinks as $footerHelpLink)
                        <li><a href="{{ $footerHelpLink->url }}">{{ $footerHelpLink->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="nx-footer__bottom">
            <p>{{ $footerInfo->copy_right }}</p>
            <p>{{ $footerInfo->powered_by }}</p>
        </div>
    </div>
</footer>
