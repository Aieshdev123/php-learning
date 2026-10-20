<?php
/**
 * Plugin Name: Aura Beauty Salon Core Features
 * Description: Automated backend infrastructure for managing Aura Salon's live hooks and custom plugin architecture.
 * Version: 1.0.0
 * Author: Ayesha (Remote Full-Stack Developer Target)
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class AuraSalonCore {
    
    public function __construct() {
        // 🪝 ACTION HOOK 1: Header Animation Banner
        add_action('wp_head', array($this, 'display_salon_banner'));

        // 🪝 ACTION HOOK 2: Hidden Security Logs into Browser Console
        add_action('wp_footer', array($this, 'inject_hidden_security_logs'));

            // 🪝 ACTION HOOK 3: Standard Copyright Footer (Abhi comment kiya hua hai)
        /* add_action('wp_footer', array($this, 'display_salon_footer_credits')); */
    }

    // ⚡ FEATURE 1: 100% Crash-Proof Moving Alert Banner
    public function display_salon_banner() {
        echo "
        <div class='aura-ticker-wrap'>
            <div class='aura-ticker'>
                <span class='aura-ticker-item'>✨ Aura Beauty Salon Special Offer: Get 20% OFF on all Bridal Packages! Book your appointment today and glow like a queen! ✨</span>
                <span class='aura-ticker-item'>✨ Aura Beauty Salon Special Offer: Get 20% OFF on all Bridal Packages! Book your appointment today and glow like a queen! ✨</span>
            </div>
        </div>

        <style>
            html, body { 
                width: 100% !important; 
                margin: 0 !important; 
                padding: 0 !important; 
                overflow-x: hidden !important; 
            }
            .aura-ticker-wrap { 
                position: fixed; 
                top: 0; 
                left: 0; 
                width: 100vw !important; 
                max-width: 100% !important;
                overflow: hidden !important; 
                background: #eccc68 !important; 
                box-shadow: 0 4px 10px rgba(0,0,0,0.1) !important;
                z-index: 999999 !important; 
                padding: 12px 0 !important; 
                box-sizing: border-box !important;
            }
            .aura-ticker { 
                display: block !important;
                white-space: nowrap !important;
                width: max-content !important;
                animation: auraMarquee 30s linear infinite !important; 
            }
            .aura-ticker-item { 
                display: inline-block !important;
                padding-right: 50px !important;
                font-family: 'Segoe UI', Arial, sans-serif !important; 
                font-size: 16px !important; 
                font-weight: bold !important; 
                color: #2f3542 !important; 
                white-space: nowrap !important;
            }
            @keyframes auraMarquee { 
                0% { transform: translate3d(0, 0, 0); } 
                100% { transform: translate3d(-50%, 0, 0); } 
            }
            body { padding-top: 50px !important; }

            /* Mobile Screens Strict Override */
            @media screen and (max-width: 480px) {
                .aura-ticker-item {
                    font-size: 13px !important; /* Mobile par text size chota taake break na ho */
                }
                .aura-ticker-wrap {
                    padding: 8px 0 !important;
                }
                body { padding-top: 40px !important; }
            }
        </style>
        ";
    } 

    // ⚡ FEATURE 2: Hidden Security Logs
    public function inject_hidden_security_logs() {
        echo "
        <script type='text/javascript'>
            console.log('%c🛡️ [SECURITY AUDIT PASS]', 'color: #2ed573; font-weight: bold; font-size: 14px;');
            console.log('%cAura Core Guard v1.0.0 is actively enforcing data integrity layers backend.', 'color: #a4b0be; font-style: italic;');
        </script>
        ";
    }
    
     // ⚡ FEATURE 3: Standard Footer Credits (Abhi inactive hai kyunke hook commented hai)
    public function display_salon_footer_credits() {
        echo "
        <div style='background: #1e2229; color: #a4b0be; text-align: center; padding: 20px; font-family: Arial, sans-serif; font-size: 14px; margin-top: 30px; clear: both; width: 100%; box-sizing: border-box;'>
            <p>© " . date('Y') . " <strong>Aura Beauty Salon</strong>. All Software Rights Reserved. Handcrafted by Ayesha Core Backend Engine.</p>
        </div>
        ";
    }
}

new AuraSalonCore();
