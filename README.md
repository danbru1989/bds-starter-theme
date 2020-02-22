# Brubaker Design Services Starter Theme

This is the custom Genesis starter theme for Brubaker Design Services. It provides a modular file structure and SASS partials for quick Wordpress developement. The Genesis Sample theme provided the foundation for this starter theme.

## Change Log
3.1.3 – Added Media Text block styles.

3.1.2 – Added .padding-none and .margin-none utility classes.

3.1.1 – Added columns block styles.

3.1.0 – Improved Gutenberg support. Added Utility Classes.

3.0.0 – Reorganized entire folder structure and improved Gutenberg compatibility.

2.2.0 – Simplified and revamped navigation styles to make development process faster.

2.1.1 – Fixed js suffix problem.

2.1.0 – Added better color palette.

2.0.0 – Cleaned up unnessesary code and reorganized modulation.

1.2.0 – Removed Columns Block styles. Opted for default WP flexbox styles.

1.1.9 – Changed full width .content-sidebar-wrap to grid template "none".

1.1.8 – Added default image styles.

1.1.7 – Added "select" form field focus styles.

1.1.6 – Created Text Domain constant.

1.1.5 – Removed footer.php because it is no longer needed. Genesis 3.1 adds footer text editing to Customizer.

1.1.4 – Replaced old constants.

1.1.3 – Added WPForms update.

1.1.2 – Fixed "genesis" parent theme.

1.1.1 – Added Roboto Slab secondary font.

1.1.0 – Merged partials with components.

1.0.0 – Initial Launch.

## Utility Classes
#### .clearfix
Clearfix floated element
#### .no-margin
Remove the content-sidebar-wrap top and bottom margins
#### .no-top-margin
Remove the content-sidebar-wrap top margin
#### .no-bottom-margin
Remove the content-sidebar-wrap bottom margin

#### .padding-all
Standard mobile and desktop padding on all sides
#### .padding-tb
Standard mobile and desktop padding on top and bottom sides
#### .padding-rl
Standard mobile and desktop padding on right and left sides
#### .padding-t
Standard mobile and desktop padding on top side
#### .padding-r
Standard mobile and desktop padding on right side
#### .padding-b
Standard mobile and desktop padding on bottom side
#### .padding-l
Standard mobile and desktop padding on left side

#### .margin-all
Standard mobile and desktop margin on all sides
#### .margin-tb
Standard mobile and desktop margin on top and bottom sides
#### .margin-rl
Standard mobile and desktop margin on right and left sides
#### .margin-t
Standard mobile and desktop margin on top side
#### .margin-r
Standard mobile and desktop margin on right side
#### .margin-b
Standard mobile and desktop margin on bottom side
#### .margin-l
Standard mobile and desktop margin on left side

## Utility Mixins & Extends
#### @include clearfix;
Clearfix floated element
#### @include media(ml) {};
Add media query styles to an element
#### @include space(padding, all);
Add standard mobile and desktop whitespace to an element

#### @extend %transition;
Add standard theme transition effects