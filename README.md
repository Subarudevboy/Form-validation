# Form Validation Application

A simple and elegant form validation application built with HTML, CSS, and PHP. This application collects user information (name, email, age) and validates age eligibility (18+).

## Features

- ✨ Clean and modern user interface
- 📱 Fully responsive design
- ✅ Form validation with PHP and JavaScript
- 🎨 Custom styling with Inter font family
- 🔒 Input sanitization for security
- ✓ Age eligibility check (18+ requirement)
- 🌐 Static version available for GitHub Pages deployment

## Files

- `form.html` - Main form page for user input (PHP version)
- `form-static.html` - Static version with JavaScript (for GitHub Pages)
- `process.php` - Backend processor that validates and displays results (PHP version)
- `index.html` - Landing page that redirects to appropriate version

## Local Development

### Prerequisites

- PHP 7.0 or higher
- Web server (Apache, Nginx, or PHP built-in server)

### Running Locally

#### Option 1: PHP Built-in Server (Recommended for testing)

```bash
# Navigate to the project directory
cd Form-validation

# Start PHP's built-in server
php -S localhost:8000

# Open your browser and visit
# http://localhost:8000
```

#### Option 2: XAMPP/WAMP/MAMP

1. Copy the project folder to your web server's document root:
   - XAMPP: `htdocs/`
   - WAMP: `www/`
   - MAMP: `htdocs/`
2. Start Apache from your control panel
3. Access via `http://localhost/Form-validation/`

## Deployment Options

### Option 1: GitHub Pages (Static Version - No Server Required) ⭐ EASIEST

**Perfect for quick, free hosting with no setup required!**

1. **Enable GitHub Pages**:
   - Go to your repository Settings
   - Navigate to "Pages" in the left sidebar
   - Under "Source", select "GitHub Actions"
   - The workflow will automatically deploy your site

2. **Access your site**:
   - Your site will be available at: `https://yourusername.github.io/Form-validation/`
   - The workflow automatically deploys on every push to main or copilot/deploy-to-production branch

3. **Features**:
   - ✅ Free hosting
   - ✅ Automatic SSL/HTTPS
   - ✅ No server maintenance
   - ✅ Uses JavaScript version (`form-static.html`)
   - ⚠️ Note: PHP version will not work on GitHub Pages

### Option 2: Traditional Web Hosting (PHP Version)

This application works best on traditional PHP hosting platforms:

1. **Shared Hosting Providers** (Hostinger, Bluehost, SiteGround, etc.)
   - Upload all files via FTP/SFTP or cPanel File Manager
   - Ensure PHP is enabled (usually enabled by default)
   - Access your domain: `https://yourdomain.com/form.html`

2. **Steps for deployment:**
   ```bash
   # Via FTP: Upload all files to public_html or www directory
   # Via cPanel: Use File Manager to upload and extract files
   ```

### Option 3: Platform as a Service (PaaS)

#### Heroku

1. Create a `composer.json` file in the root directory
2. Add a `Procfile` if needed
3. Deploy using Heroku CLI:
   ```bash
   heroku create your-app-name
   git push heroku main
   ```

#### Railway.app

1. Connect your GitHub repository
2. Railway will auto-detect PHP
3. Deploy with one click

### Option 4: Cloud Platforms

#### AWS (Amazon Web Services)

- **EC2**: Deploy on a virtual server with Apache/Nginx + PHP
- **Elastic Beanstalk**: Upload your code and auto-deploy
- **S3 + Lambda**: For serverless deployment (requires modifications)

#### Google Cloud Platform

- **App Engine**: Deploy with `gcloud app deploy`
- **Compute Engine**: Set up LAMP/LEMP stack

#### DigitalOcean

1. Create a Droplet with LAMP/LEMP stack
2. Upload files via SFTP or Git
3. Configure Apache/Nginx virtual host

### Option 5: Vercel/Netlify (Static Hosting)

⚠️ **Note**: These platforms are primarily for static sites. Use the static version (`form-static.html`) for these platforms:

- **Vercel**: Use Vercel's PHP runtime or convert PHP to serverless functions
- **Netlify**: Use Netlify Functions (requires code conversion)

For simplest deployment, use traditional PHP hosting.

## Configuration

### Basic Configuration

No configuration needed! The application works out of the box.

### Security Enhancements (Production)

For production deployment, consider:

1. **HTTPS**: Enable SSL/TLS on your hosting
2. **CSRF Protection**: Add CSRF tokens to forms
3. **Rate Limiting**: Implement submission rate limits
4. **Database Storage**: Store submissions in a database instead of just displaying them

### Environment Variables

Currently, no environment variables are required. For future database integration:

```bash
DB_HOST=localhost
DB_NAME=formdb
DB_USER=username
DB_PASS=password
```

## Project Structure

```
Form-validation/
├── form.html          # Main form page
├── process.php        # Form processor
├── index.html         # Landing page
├── README.md          # This file
└── .gitignore         # Git ignore file
```

## Browser Support

- ✅ Chrome (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Edge (latest)
- ✅ Mobile browsers

## Technologies Used

- **HTML5**: Semantic markup
- **CSS3**: Modern styling with flexbox
- **PHP 7+**: Server-side processing
- **Google Fonts**: Inter font family

## Testing

### Manual Testing

1. Fill out the form with valid data
2. Submit and verify the results page displays correctly
3. Test with age < 18 and age >= 18 to verify eligibility check
4. Test with invalid email format (browser validation should catch it)
5. Test with missing required fields

### Test Cases

| Test Case | Input | Expected Output |
|-----------|-------|----------------|
| Valid adult | Age: 25 | "You are eligible (18 or above)" |
| Valid minor | Age: 15 | "You are not eligible (under 18)" |
| Empty form | N/A | Browser validation prevents submission |
| Invalid email | email@invalid | Browser validation prevents submission |

## Troubleshooting

### PHP not executing

- Ensure PHP is installed: `php -v`
- Check file extensions are `.php` not `.html` for PHP files
- Verify server configuration allows PHP execution

### Form not submitting

- Check form `action` attribute points to `process.php`
- Verify `method="POST"` is set on the form
- Check browser console for JavaScript errors (though this app doesn't use JS)

### Styles not loading

- Verify Google Fonts can be accessed
- Check browser console for CSS errors
- Clear browser cache

## Future Enhancements

- [ ] Database integration for storing submissions
- [ ] Email notifications
- [ ] Admin dashboard
- [ ] Additional form fields
- [ ] AJAX form submission
- [ ] File upload capability
- [ ] Multi-language support

## Credits

**Developer**: DEMILADE ILESANMI  
**Student ID**: RUN/CMP/23/15262  
**Level**: 300 Level  
**Department**: Computer Science

## License

This project is for educational purposes.

## Support

For issues or questions, please open an issue in the GitHub repository.

## Quick Deployment Checklist

- [ ] Choose a hosting platform
- [ ] Upload all project files
- [ ] Verify PHP is enabled on the server
- [ ] Test the form submission
- [ ] Enable HTTPS/SSL
- [ ] Set up custom domain (optional)
- [ ] Monitor error logs

---

**Happy Deploying! 🚀**
