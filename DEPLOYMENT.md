# Deployment Guide

This guide provides detailed step-by-step instructions for deploying the Form Validation application to various hosting platforms.

## Table of Contents

1. [Shared Hosting (cPanel)](#shared-hosting-cpanel)
2. [Heroku](#heroku-deployment)
3. [Railway.app](#railway-deployment)
4. [DigitalOcean](#digitalocean-deployment)
5. [AWS Elastic Beanstalk](#aws-elastic-beanstalk)
6. [Vercel (Static + Serverless)](#vercel-deployment)
7. [InfinityFree (Free Hosting)](#infinityfree-deployment)

---

## Shared Hosting (cPanel)

**Best for**: Traditional web hosting with PHP support (Hostinger, Bluehost, SiteGround, etc.)

### Prerequisites
- Active hosting account with cPanel access
- FTP/SFTP credentials or cPanel File Manager access

### Steps

1. **Access cPanel**
   - Log in to your hosting provider's cPanel
   - Navigate to File Manager

2. **Upload Files**
   ```
   Option A: Using File Manager
   - Navigate to public_html (or www)
   - Click "Upload"
   - Select all project files (form.html, process.php, index.html, etc.)
   - Wait for upload to complete
   
   Option B: Using FTP
   - Connect via FTP client (FileZilla, WinSCP)
   - Navigate to public_html directory
   - Upload all files from your local project directory
   ```

3. **Set Permissions**
   - Ensure PHP files have 644 permissions
   - Directories should have 755 permissions

4. **Test Your Deployment**
   - Visit: `https://yourdomain.com/`
   - Should redirect to form.html
   - Fill out the form and test submission

5. **Enable SSL (Recommended)**
   - In cPanel, go to "SSL/TLS Status"
   - Enable AutoSSL or install Let's Encrypt certificate
   - Update .htaccess to force HTTPS (uncomment lines in .htaccess)

### Troubleshooting
- If PHP files download instead of executing, contact support to enable PHP
- Check error logs in cPanel if you encounter issues
- Verify file paths are correct

---

## Heroku Deployment

**Best for**: Quick deployment with Git integration

### Prerequisites
- Heroku account (free tier available)
- Heroku CLI installed
- Git initialized in your project

### Steps

1. **Install Heroku CLI** (if not installed)
   ```bash
   # macOS
   brew tap heroku/brew && brew install heroku
   
   # Windows
   # Download from https://devcenter.heroku.com/articles/heroku-cli
   
   # Linux
   curl https://cli-assets.heroku.com/install.sh | sh
   ```

2. **Login to Heroku**
   ```bash
   heroku login
   ```

3. **Create Heroku App**
   ```bash
   cd /path/to/Form-validation
   heroku create your-app-name
   ```

4. **Deploy**
   ```bash
   git add .
   git commit -m "Prepare for Heroku deployment"
   git push heroku main
   ```

5. **Open Your App**
   ```bash
   heroku open
   ```

### Notes
- Heroku uses the `Procfile` to determine how to run your app
- The `composer.json` tells Heroku this is a PHP application
- Free tier apps sleep after 30 minutes of inactivity

---

## Railway Deployment

**Best for**: Modern, simple deployment with automatic SSL

### Prerequisites
- Railway account (free tier available)
- GitHub account (for repository connection)

### Steps

1. **Sign Up/Login**
   - Go to [railway.app](https://railway.app)
   - Sign in with GitHub

2. **Create New Project**
   - Click "New Project"
   - Select "Deploy from GitHub repo"
   - Choose your Form-validation repository

3. **Configure Deployment**
   - Railway auto-detects PHP
   - No additional configuration needed
   - Click "Deploy"

4. **Get Your URL**
   - Once deployed, Railway provides a public URL
   - Visit the URL to test your application

### Custom Domain (Optional)
- Go to Settings → Domains
- Add your custom domain
- Update DNS records as instructed

---

## DigitalOcean Deployment

**Best for**: Full server control and scalability

### Prerequisites
- DigitalOcean account
- Basic Linux command line knowledge

### Steps

1. **Create Droplet**
   - Log in to DigitalOcean
   - Click "Create" → "Droplets"
   - Choose Ubuntu 20.04 or 22.04
   - Select LAMP/LEMP One-Click App (or install manually)
   - Choose plan ($4-6/month for basic)
   - Select datacenter region
   - Add SSH key (recommended)
   - Click "Create Droplet"

2. **Connect to Droplet**
   ```bash
   ssh root@your-droplet-ip
   ```

3. **Install LAMP Stack** (if not using One-Click)
   ```bash
   # Update system
   sudo apt update && sudo apt upgrade -y
   
   # Install Apache
   sudo apt install apache2 -y
   
   # Install PHP
   sudo apt install php libapache2-mod-php php-mysql -y
   
   # Start Apache
   sudo systemctl start apache2
   sudo systemctl enable apache2
   ```

4. **Deploy Files**
   ```bash
   # Navigate to web root
   cd /var/www/html
   
   # Remove default index
   sudo rm index.html
   
   # Upload files via Git
   git clone https://github.com/Subarudevboy/Form-validation.git .
   
   # Or use SCP from local machine:
   # scp -r /path/to/Form-validation/* root@your-droplet-ip:/var/www/html/
   
   # Set permissions
   sudo chown -R www-data:www-data /var/www/html
   sudo chmod -R 755 /var/www/html
   ```

5. **Configure Apache Virtual Host**
   ```bash
   sudo nano /etc/apache2/sites-available/000-default.conf
   
   # Ensure DocumentRoot points to /var/www/html
   # Save and exit (Ctrl+X, Y, Enter)
   
   # Restart Apache
   sudo systemctl restart apache2
   ```

6. **Enable SSL with Let's Encrypt**
   ```bash
   sudo apt install certbot python3-certbot-apache -y
   sudo certbot --apache -d yourdomain.com
   ```

7. **Test**
   - Visit your droplet's IP address or domain
   - Test form submission

---

## AWS Elastic Beanstalk

**Best for**: AWS ecosystem integration with auto-scaling

### Prerequisites
- AWS account
- AWS CLI and EB CLI installed

### Steps

1. **Install EB CLI**
   ```bash
   pip install awsebcli --upgrade --user
   ```

2. **Initialize EB Application**
   ```bash
   cd /path/to/Form-validation
   eb init
   
   # Select region
   # Create new application: form-validation
   # Platform: PHP
   # PHP version: 7.4 or higher
   # Do not use CodeCommit: N
   # Do not set up SSH: N (or Y if you want)
   ```

3. **Create Environment and Deploy**
   ```bash
   eb create form-validation-env
   
   # Wait for environment creation (5-10 minutes)
   ```

4. **Open Application**
   ```bash
   eb open
   ```

5. **Update Application** (for future changes)
   ```bash
   git add .
   git commit -m "Update"
   eb deploy
   ```

### Configuration
- Create `.ebextensions/` folder for custom configurations
- Manage environment variables in EB console

---

## Vercel Deployment

**Note**: Vercel is primarily for static sites. PHP requires workarounds.

### Option A: Convert to Static (No PHP)
If you only need the form without processing:
1. Keep `form.html` and `index.html`
2. Remove `process.php`
3. Use a third-party form service (Formspree, etc.)

### Option B: Use Vercel with PHP Runtime
1. Install Vercel CLI:
   ```bash
   npm i -g vercel
   ```

2. Create `vercel.json`:
   ```json
   {
     "functions": {
       "api/*.php": {
         "runtime": "vercel-php@0.6.0"
       }
     },
     "routes": [
       { "src": "/process.php", "dest": "/api/process.php" }
     ]
   }
   ```

3. Move `process.php` to `api/` folder

4. Deploy:
   ```bash
   vercel
   ```

**Recommendation**: Use traditional PHP hosting instead for simpler deployment.

---

## InfinityFree Deployment

**Best for**: Free hosting with PHP support (no credit card required)

### Prerequisites
- InfinityFree account (sign up at [infinityfree.net](https://infinityfree.net))

### Steps

1. **Create Account**
   - Go to InfinityFree
   - Sign up (free, no credit card)
   - Create a new hosting account

2. **Access File Manager**
   - Login to control panel
   - Open "Online File Manager"
   - Navigate to `htdocs` folder

3. **Upload Files**
   - Delete default files in htdocs
   - Upload all your project files
   - Ensure proper folder structure

4. **Test Your Site**
   - Your site URL: `http://yourusername.infinityfreeapp.com`
   - Test form submission

### Limitations
- May have ads on free plan
- Limited bandwidth
- Slower performance compared to paid hosting

---

## Post-Deployment Checklist

After deploying to any platform:

- [ ] Test form submission with valid data
- [ ] Test age validation (< 18 and >= 18)
- [ ] Check email validation
- [ ] Verify responsive design on mobile
- [ ] Enable SSL/HTTPS
- [ ] Set up custom domain (if desired)
- [ ] Check error logs for any issues
- [ ] Test from different browsers
- [ ] Monitor performance
- [ ] Set up backups (if applicable)

---

## Monitoring and Maintenance

### Check Application Health
- Regularly test form submission
- Monitor server logs for errors
- Check uptime using services like UptimeRobot

### Security Updates
- Keep PHP version updated
- Regularly check for security advisories
- Implement rate limiting if traffic increases
- Add CAPTCHA if spam becomes an issue

### Performance Optimization
- Enable caching headers
- Minify CSS (if needed)
- Use CDN for assets (already using Google Fonts CDN)
- Monitor page load times

---

## Need Help?

- Check platform-specific documentation
- Review error logs on your hosting platform
- Test locally first using `php -S localhost:8000`
- Ensure all files are uploaded correctly
- Verify PHP is enabled on your hosting

---

**Quick Recommendation**: For the easiest deployment, use **shared hosting with cPanel** or **Railway.app**. Both offer simple setup with minimal configuration.

Happy Deploying! 🚀
