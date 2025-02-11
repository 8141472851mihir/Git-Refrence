# Starting with Git: A Beginner's Guide

<details><summary><h2>Table of Contents</h2></summary>

- [Resources](#resources)
  - [Git Cheatsheet](https://education.github.com/git-cheat-sheet-education.pdf)
  - [Installing Git](https://git-scm.com/downloads)
  - [Git Book](https://git-scm.com/book/en/v2)

- [Installation Guide](#installation-guide)
  - [Linux and macOS](#linux-and-macos)
  - [Windows](#windows)

- [Initial Configuration](#initial-configuration)

- [Password/Credential Storage](#passwordcredential-storage)
  - [Linux](#linux)
  - [Windows](#windows-1)
  - [macOS](#macos)

- [Understanding Git and GitHub](#understanding-git-and-github)

- [Alternatives to GitHub](#alternatives-to-github)

- [Git Essentials](#git-essentials)

- [Creating a Repository](#creating-a-repository)
  - [Initializing in an Existing Directory](#initializing-in-an-existing-directory)
  - [Cloning an Existing Repository](#cloning-an-existing-repository)

- [Markdown Basics](#markdown-basics)

- [Pushing to a Repository](#pushing-to-a-repository)

- [Checking Remote Repository URL](#checking-remote-repository-url)

- [Forking and the Pull-Push Cycle in Git](#forking-and-the-pull-push-cycle-in-git)
  - [Forking a Repository](#forking-a-repository)
  - [Cloning and Making Changes](#cloning-and-making-changes)
  - [Keeping Your Fork Updated](#keeping-your-fork-updated)
  - [Pushing Changes and Creating a Pull Request](#pushing-changes-and-creating-a-pull-request)
  - [Merging Changes](#merging-changes)
  - [Resolving Merge Conflicts](#resolving-merge-conflicts)

</details>

## Resources
- Git Cheatsheet: [Git Cheat Sheet PDF](https://education.github.com/git-cheat-sheet-education.pdf)
- Installing Git: [Download Git](https://git-scm.com/downloads)
- Learning Resource: [Git Book](https://git-scm.com/book/en/v2)

## Installation Guide

### Linux and macOS:

**Check for Git:**
Most likely, Git is already installed on your system. You can check this by running:
```bash
git --version
```

**Installation:**

- **Linux (Debian-based systems):**
  ```bash
  sudo apt update && sudo apt install git -y
  ```

- **macOS:**
  ```bash
  brew install git
  ```

### Windows:

1. Download and install Git from [Git SCM](https://git-scm.com/downloads). Follow the installation wizard.
2. Choose your default editor.
3. Set the default branch name to `main` (this can be changed later).

**Verify Installation:**
Run the following command in a new terminal window (existing terminal windows won't recognize Git immediately):
```bash
git --version
```

In wsl, you might need to reload the terminal, and / or install some packages
To reload the terminal
```bash
exit
wsl --shutdown
wsl
```
install the packages missing on trying to push, but mainly
```bash
sudo apt update && sudo apt install libice6 -y && sudo apt install libsm6 -y
```

## Initial Configuration

**Set Up Your Identity:**
Configure your username and email with Git:
```bash
git config --global user.name "Your Name"
git config --global user.email your.email@example.com
```

**Configure GitHub Settings:**
Set your GitHub username:
```bash
git config --global credential.username YourGitHubUsername
```

For more details, visit [First Time Git Setup](https://git-scm.com/book/en/v2/Getting-Started-First-Time-Git-Setup).

## Password/Credential Storage 

### Linux:

**Install Seahorse:**
```bash
sudo apt update && sudo apt install seahorse -y
```

**Set up Secret Service:**
```bash
git config --global credential.credentialStore secretservice
```

**Download GCM:**
Get the Debian package (for Debian distributions):
```bash
wget [GCM Download Link]
```
(Currently: `wget https://github.com/git-ecosystem/git-credential-manager/releases/download/v2.4.1/gcm-linux_amd64.2.4.1.deb`)

**Install and Configure:**
```bash
sudo dpkg -i gcm-linux_amd64.2.4.1.deb  # Replace with correct package name
git-credential-manager configure
```

### Windows:

If installed via the graphical installer, GCM is set up by default.

### macOS:
`TODO: Add macOS GCM installation steps`

## Understanding Git and GitHub

**Git:**
- Local installation.
- Focuses on version control and code sharing.
- No built-in user management.

**GitHub:**
- Cloud-hosted service.
- Centralized hosting for Git projects.
- Integrated user management features.

## Alternatives to GitHub
- Bitbucket
- GitLab
- Google Cloud Source Repositories
- Phabricator
- RhodeCode
- SourceForge

## Git Essentials
- Repositories: Containers for your project.
- Commit: Record of changes to a repository.
- Branches: Different versions of a repository.
- Pull Requests: Proposed changes to a repository.

## Creating a Repository

### Initializing in an Existing Directory
Navigate to your project directory:
- **Windows:** `$ cd C:/Users/user/my_project`
- **Linux/macOS:** `$ cd /Users/user/my_project`

Initialize Git:
```bash
git init -b main
```

Create a file, add to staging, and commit:
```bash
touch README.md  # For Linux/macOS
echo "" > README.md  # For Windows
git add README.md
git commit -m "first commit"
```

Upload to GitHub:
```bash
git remote add origin [Repository Link]
git push -u origin main
```

### Cloning an Existing Repository
```bash
git clone [Repository URL]
```

## Markdown Basics
For detailed syntax, visit [Markdown Guide](https://www.markdownguide.org/basic-syntax/).

## Pushing to a Repository
- `git add .`: Adds all files to the staging area.
- `git status`: Shows modified files.
- `git commit -m "<message>"`: Commits files with a message.
- `git push origin main`: Pushes commits to the remote repository.

## Checking Remote Repository URL
```bash
git remote -v
```
Expected output:
```bash
origin [Repository URL] (fetch)
origin [Repository URL] (push)
```

## Forking and the Pull-Push Cycle in Git

### Forking a Repository
"Forking" in Git means creating a personal copy of someone else's project on GitHub. It allows you to make changes without affecting the original project.

**Steps to Fork:**
1. Go to the GitHub page of the repository you want to fork.
2. Click the "Fork" button. This creates a copy of the repository in your GitHub account.

### Cloning and Making Changes

**1. Cloning Your Fork:**
Clone your forked repository to your local machine:
```bash
git clone [Your Fork's URL]
```

**2. Making Changes Locally:**
- Open the cloned repository on your machine.
- Make your desired changes in the files.

### Keeping Your Fork Updated

It's important to keep your fork synchronized with the original repository.

**Option 1: Using GitHub to Update Your Fork:**
- On your fork's GitHub page, click "Fetch upstream" > "Fetch and merge."
- To get these updates on your local machine:
  ```bash
  git pull
  ```

**Option 2: Updating via Terminal:**
- Add the original repository as a remote:
  ```bash
  git remote add upstream [Original Repository URL]
  ```
- Fetch and merge changes from the original repo:
  ```bash
  git fetch upstream
  git merge upstream/main main
  ```
- Update your fork on GitHub:
  ```bash
  git push origin main
  ```

### Pushing Changes and Creating a Pull Request

**1. Pushing Changes:**
After making changes, push them to your fork on GitHub:
```bash
git add .
git commit -m "[Commit Message]"
git push origin main
```

**2. Creating a Pull Request:**
To contribute your changes back to the original project:
- On GitHub, navigate to your fork.
- Click "Pull request" or "Compare & pull request."
- Add a description and submit the pull request.

### Merging Changes

If your pull request is approved by the maintainers of the original repository, they will merge it.

### Resolving Merge Conflicts

If there are conflicts during a merge:
- Git will mark the files with conflicts.
- Manually resolve these by editing the file to remove the conflict markers (`<<<<`, `====`, `>>>>`).
- Commit the resolved conflicts:
  ```bash
  git add [Resolved File]
  git commit -m "Resolved merge conflict"
  ```

---
## Author Information

**Name:** Devansh Sehgal  
**Email:** devanshsehgal02@gmail.com  
**GitHub:** https://github.com/Devansh-ops  

This guide was created by [Devansh Sehgal](mailto:devanshsehgal02@gmail.com) to provide a comprehensive introduction to Git and GitHub.  
For any queries or further information, feel free to contact via email or GitHub.
