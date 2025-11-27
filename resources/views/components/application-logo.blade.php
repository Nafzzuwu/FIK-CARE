<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
  <!-- Background Circle -->
  <circle cx="100" cy="100" r="95" fill="#2563eb" opacity="0.1"/>
  
  <!-- Main Shield Shape -->
  <path d="M100 20 L160 50 L160 110 Q160 150 100 180 Q40 150 40 110 L40 50 Z" 
        fill="#2563eb" stroke="#1e40af" stroke-width="3"/>
  
  <!-- Inner Shield Highlight -->
  <path d="M100 35 L150 60 L150 110 Q150 140 100 165 Q50 140 50 110 L50 60 Z" 
        fill="#3b82f6" opacity="0.3"/>
  
  <!-- Megaphone/Speaker Icon -->
  <g transform="translate(70, 70)">
    <!-- Speaker body -->
    <path d="M5 15 L25 10 L25 40 L5 35 Z" fill="white" stroke="white" stroke-width="2"/>
    <!-- Speaker cone -->
    <path d="M25 15 L45 5 L45 45 L25 35 Z" fill="white" opacity="0.9"/>
    <!-- Sound waves -->
    <path d="M50 15 Q55 25 50 35" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
    <path d="M56 10 Q63 25 56 40" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
  </g>
  
  <!-- Text FIK -->
  <text x="100" y="155" font-family="Arial, sans-serif" font-size="24" font-weight="bold" 
        fill="white" text-anchor="middle">FIK</text>
  
  <!-- Text CARE -->
  <text x="100" y="175" font-family="Arial, sans-serif" font-size="16" font-weight="600" 
        fill="white" text-anchor="middle" opacity="0.9">CARE</text>
</svg>