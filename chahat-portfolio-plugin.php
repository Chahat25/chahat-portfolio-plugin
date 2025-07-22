<?php
/*
Plugin Name: Chahat Portfolio Plugin
Description: A custom portfolio plugin with admin panel and shortcode display.
Version: 1.0
Author: Chahat Gupta
*/

// Create custom post type for Portfolio Projects
function chahat_register_portfolio_post_type() {
    register_post_type('chahat_portfolio', array(
        'labels' => array(
            'name' => __('Portfolio Projects'),
            'singular_name' => __('Portfolio Project')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-portfolio'
    ));
}
add_action('init', 'chahat_register_portfolio_post_type');

// Shortcode to display static demo portfolio projects
function chahat_portfolio_shortcode() {
    $projects = [
        [
            'title' => 'Ad Performance Prediction Model',
            'desc' => 'Built using Scikit-learn & Pandas. Predicted ad click-through rate with 85% accuracy on 10k dataset.'
        ],
        [
            'title' => 'Store Navigation System',
            'desc' => 'An IoT robot using UART & A* pathfinding to guide users in large retail stores.'
        ],
        [
            'title' => 'GazeType: Text Entry for ALS',
            'desc' => 'Used LSTM and Mediapipe Iris tracking for gaze-based keyboard. Achieved 78% accuracy.'
        ],
        [
            'title' => 'Portfolio Website + WordPress Plugin',
            'desc' => 'Developed a responsive personal portfolio with dark mode, animations, and integrated custom WordPress plugin.'
        ]
        
    ];

    $output = '<div style="text-align:center; max-width: 900px; margin: auto;">
                <h2>🌟 My Portfolio Projects</h2>
                <ul style="list-style: none; padding: 0;">';

    foreach ($projects as $project) {
        $output .= '<li style="margin-bottom: 2rem; padding: 1rem; border: 1px solid #ddd; border-radius: 8px;">
                      <h3>' . esc_html($project['title']) . '</h3>
                      <p>' . esc_html($project['desc']) . '</p>
                   </li>';
    }

    $output .= '</ul></div>';
    return $output;
}
add_shortcode('chahat_portfolio', 'chahat_portfolio_shortcode');
